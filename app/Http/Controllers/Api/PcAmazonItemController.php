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
    public function getItems() {
        $re = DB::select(DB::raw("
        select 
           pc_amazon_items.id as id, 
           concat(SUBSTRING(product_name, 1, 50), '...') as product_name, 
           asin, 
           pc_amazon_items.created_at as created_at, 
           pc_user_amazon_items.id as pc_user_amazon_item_id,
           pc_amazon_items.image_url as image_url,
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

        $pcAmazonItem = PcAmazonItem::where([
            'asin' => $data['asin']
        ])->first();

        if(!$pcAmazonItem) {
            $productName = 'Unknown Product Name';
            $productImageUrl = '';

            $re = $this->amazonProductAdvertisingAPI->getInfo($data['asin']);

            if(isset($re['error'])) {
                if($re['error'] === 2) {
                    return response()->json(['message' => 'Invalid ASIN number'], 400);
                }
            } else {
                $productName = $re['product_name'];
                $productImageUrl = $re['image_url'];
            }

            $pcAmazonItem = PcAmazonItem::create([
                'asin' => $data['asin'],
                'product_name' => $productName,
                'image_url' => $productImageUrl
            ]);
        }

        $userAmazonItem = PcUserAmazonItem::where([
            'user_id' => Auth::user()->id,
            'pc_amazon_item_id' => $pcAmazonItem->id
        ])->first();

        if($userAmazonItem) {
            return response()->json(['message' => 'You cannot add same item twice'], 400);
        }

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

    public function checkUserAmazonItem($asin) {
        $re = DB::select(DB::raw("
        select * from pc_user_amazon_items
        join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
        where pc_user_amazon_items.user_id = ? and pc_amazon_items.asin = ?
        "), [Auth::user()->id, $asin]);

        if(count($re)) {
            return response()->json(['message' => true]);
        }

        return response()->json(['message' => false]);
    }
}
