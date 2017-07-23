<?php

namespace App\Http\Controllers\Api;

use App\PcRequest;
use App\PcRequestUserAmazonItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class PcRequestController extends Controller
{

    /**
     * Get summary of requests.
     *
     * @return Json
     * @throws UnauthorizedHttpException
     */
    public function getRequestSummary() {
        $re = DB::select(DB::raw("
        select
          pc_requests.id as pc_request_id,
          pc_requests.status as status,
          count(1) as number_of_requested_items,
          pc_requests.created_at as pc_request_created_at,
          (select count(1) from pc_request_user_amazon_items where pc_request_id = pc_requests.id and status = 'Completed') as number_of_completed_items
        from pc_requests
        join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_request_id = pc_requests.id
        where pc_requests.user_id = ?
        group by pc_requests.id, pc_requests.status, pc_requests.created_at
        order by pc_requests.created_at desc
        "), [Auth::user()->id]);

        return response()->json($re);
    }

    /**
     * Get summary of all results.
     *
     * @return Json
     * @throws UnauthorizedHttpException
     */
    public function getResultSummary() {
        $re = DB::select(DB::raw("
        select
          concat(SUBSTRING(pc_amazon_items.product_name, 1, 30), '...') as product_name,
          pc_amazon_items.asin as asin,
          pc_amazon_items.image_url as image_url,
          pc_amazon_items.rank as rank,
          pc_amazon_items.estimated_sales as estimated_sales,
          pc_alibaba_items.max_roi as max_roi,
          pc_alibaba_items.min_roi as min_roi,
          pc_alibaba_items.moq as moq
        from pc_request_user_amazon_items
        join pc_user_amazon_items on pc_request_user_amazon_items.pc_user_amazon_item_id = pc_user_amazon_items.id
        join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
        left join pc_amazon_item_alibaba_items on pc_amazon_item_alibaba_items.pc_amazon_item_id = pc_amazon_items.id
        left join pc_alibaba_items on pc_alibaba_items.id = pc_amazon_item_alibaba_items.pc_alibaba_item_id
        where pc_user_amazon_items.user_id = ? and pc_request_user_amazon_items.status = 'Completed'
        "), [Auth::user()->id]);

        return response()->json($re);
    }

    /**
     * Get detail of specified request
     *
     * @return Json
     * @throws UnauthorizedHttpException, BadRequestHttpException
     */
    public function getDetail($id) {
        if(!is_numeric($id)) {
            return response()->json(['message' => 'invalid request id'], 400);
        }

        $re = DB::select(DB::raw("
        select
           pc_requests.id as pc_request_id,
           pc_request_user_amazon_items.pc_user_amazon_item_id as pc_request_item_id,
           pc_requests.created_at as pc_request_created_at,
           pc_request_user_amazon_items.status as status,
           pc_amazon_items.asin as asin,
           pc_amazon_items.image_url as image_url,
           concat(SUBSTRING(pc_amazon_items.product_name, 1, 50), '...') as product_name,
           pc_amazon_items.list_price as list_price,
           pc_amazon_items.rank as rank,
           pc_amazon_items.estimated_sales as estimated_sales,
           pc_amazon_items.amazon_fee as amazon_fee,
           pc_amazon_items.number_of_review as number_of_review
        from pc_request_user_amazon_items
        join pc_requests on pc_requests.id = pc_request_user_amazon_items.pc_request_id
        join pc_user_amazon_items on pc_user_amazon_items.id = pc_request_user_amazon_items.pc_user_amazon_item_id
        join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
        where pc_user_amazon_items.user_id = ? and pc_requests.id = ?
        "), [Auth::user()->id, $id]);

        if(!count($re)) {
            return response()->json(['message' => 'request id does not exist'], 400);
        }

        return response()->json($re);
    }

    /**
     * Get items' detail information within specified request
     *
     * @return Json
     * @throws UnauthorizedHttpException, BadRequestHttpException
     */
    public function getItemDetail($id) {
        if(!is_numeric($id)) {
            return response()->json(['message' => 'invalid request id'], 400);
        }

        $re = DB::select(DB::raw("
        select
           pc_request_user_amazon_items.pc_user_amazon_item_id as pc_request_item_id,
           pc_request_user_amazon_items.status as status,
           pc_amazon_items.asin as asin,
           pc_amazon_items.image_url as image_url,
           concat(SUBSTRING(pc_amazon_items.product_name, 1, 50), '...') as product_name,
           pc_amazon_items.list_price as list_price,
           pc_amazon_items.rank as rank,
           pc_amazon_items.estimated_sales as estimated_sales,
           pc_amazon_items.amazon_fee as amazon_fee,
           pc_amazon_items.number_of_review as number_of_review,
           pc_request_user_amazon_items.created_at as pc_request_created_at,
           pc_alibaba_items.alibaba_url as alibaba_url,
           pc_alibaba_items.alibaba_price_max as alibaba_price_max,
           pc_alibaba_items.alibaba_price_min as alibaba_price_min,
           pc_alibaba_items.length as length,
           pc_alibaba_items.width as width,
           pc_alibaba_items.height as height,
           pc_alibaba_items.weight as weight,
           pc_alibaba_items.moq as moq,
           pc_alibaba_items.lead_time as lead_time,
           pc_alibaba_items.estimated_fba_cost_by_air as estimated_fba_cost_by_air,
           pc_alibaba_items.estimated_fba_cost_by_lcl as estimated_fba_cost_by_lcl,
           pc_alibaba_items.max_roi as max_roi,
           pc_alibaba_items.min_roi as min_roi,
           pc_amazon_item_alibaba_items.similarity as similarity,
           pc_amazon_item_alibaba_items.potential_opportunity as potential_opportunity
        from pc_user_amazon_items
        join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_user_amazon_item_id = pc_user_amazon_items.id
        join pc_amazon_items on pc_amazon_items.id = pc_amazon_item_id
        left join pc_amazon_item_alibaba_items on pc_amazon_item_alibaba_items.pc_amazon_item_id = pc_amazon_items.id
        left join pc_alibaba_items on pc_alibaba_items.id = pc_amazon_item_alibaba_items.pc_alibaba_item_id
        where pc_user_amazon_items.user_id = ?
        and pc_user_amazon_items.id = ?
        and pc_request_user_amazon_items.status = 'Completed'
        "), [Auth::user()->id, $id]);

        if(!count($re)) {
            return response()->json(['message' => 'item id does not exist or item is hidden'], 400);
        }

        return response()->json($re);
    }

    /**
     * Create request
     *
     * @param  Request  $request  an array with valid list of pc_user_amazon_item_id
     * @return Json
     * @throws UnauthorizedHttpException, BadRequestHttpException
     */
    public function create(Request $request) {
        $data = $request->all();

        if(!is_array($data)) {
            return response()->json(['message' => 'invalid request data format'], 400);
        }

        if(!count($data)) {
            return response()->json(['message' => 'request payload cannot be empty'], 400);
        }

        $pcRequest = PcRequest::create([
            'user_id' => Auth::user()->id
        ]);

        if(!$pcRequest) {
            return response()->json(['message' => 'unable to create quest'], 400);
        }

        $payload = [];

        foreach ($data as $pcUserAmazonItemId) {
            if(!is_numeric($pcUserAmazonItemId)) {
                return response()->json(['message' => 'invalid user\'s amazon item id'], 400);
            }

            array_push($payload, [
                'pc_request_id' => $pcRequest->id,
                'pc_user_amazon_item_id' => $pcUserAmazonItemId
            ]);
        }

        $re = PcRequestUserAmazonItem::insert($payload);

        if(!$re) {
            return response()->json(['message' => 'unable to create quest'], 400);
        }

        return response()->json(['message' => 'ok', 'pc_request_id' => $pcRequest->id]);
    }
}
