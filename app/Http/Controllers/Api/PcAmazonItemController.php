<?php

namespace App\Http\Controllers\Api;

use App\PcAmazonItem;
use App\PcUserAmazonItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PcAmazonItemController extends Controller
{
    /*
     *
     * select
           amazon_url, asin, list_price, rank, estimated_sales, amazon_fee, number_of_review,
           alibaba_url, alibaba_price_max, alibaba_price_min, length, width, height, weight, moq,
           lead_time, similarity, estimated_fba_cost_by_air, estimated_fba_cost_by_lcl, max_roi, min_roi,
           potential_opportunity
        from amazon_items
        join user_amazon_items on user_amazon_items.amazon_item_id = amazon_items.id
        join user on user_amazon_items.user_id = user.id
        left join alibaba_items on alibaba_items.amazon_item_id = amazon_items.id
        where user.id = ?
     * */
    public function getItems() {
        $re = DB::select(DB::raw("
        select 
           pc_amazon_items.id as id, 
           concat(SUBSTRING(product_name, 1, 50), '...') as product_name, 
           asin, 
           pc_amazon_items.created_at as created_at, 
           pc_user_amazon_items.id as pc_user_amazon_item_id,
           (select status from pc_request_user_amazon_items where pc_request_user_amazon_items.pc_user_amazon_item_id = pc_user_amazon_items.id) as pc_request_status
        from pc_amazon_items
        join pc_user_amazon_items on pc_user_amazon_items.pc_amazon_item_id = pc_amazon_items.id
        join users on pc_user_amazon_items.user_id = users.id
        where users.id = ?
        order by pc_user_amazon_items.created_at desc
        "), [Auth::user()->id]);

        return response()->json($re);
    }

    public function addItem(Request $request) {
        $data = $request->all();

        if(!isset($data['asin'])) {
            return response()->json(['message' => 'missing asin number'], 400);
        }


        $pcAmazonItem = PcAmazonItem::firstOrCreate([
            'asin' => $data['asin'],
            'product_name' => 'default value'
        ]);

        PcUserAmazonItem::create([
            'user_id' => Auth::user()->id,
            'pc_amazon_item_id' => $pcAmazonItem->id
        ]);

        return response()->json(['message' => 'ok']);
    }

    public function deleteItem($id) {
        $re = DB::delete(DB::raw("
        delete from pc_user_amazon_items where id = ?
        "), [$id]);
        if(!$re) {
            return response()->json(['message' => 'id does not exist'], 400);
        } else {
            return response()->json(['message' => 'ok']);
        }
    }
}
