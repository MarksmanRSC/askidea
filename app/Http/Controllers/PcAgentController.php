<?php

namespace App\Http\Controllers;

use App\PcAlibabaItem;
use App\PcAmazonItem;
use App\PcRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PcAgentController extends Controller
{
    public function home() {
        $requests = DB::select(DB::raw("
        select
          pc_requests.id as pc_request_id,
          pc_requests.status as status,
          count(1) as number_of_requested_items,
          users1.name as user_name,
          users1.email as user_email,
          roles.name as user_role,
          pc_requests.created_at as pc_request_created_at,
          (select count(1) from pc_request_user_amazon_items where pc_request_id = pc_requests.id and status = 'Completed') as number_of_completed_items
        from pc_requests
        join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_request_id = pc_requests.id
        join users as users1 on users1.id = pc_requests.user_id
        join roles on users1.role_id = roles.id
        group by pc_requests.id, pc_requests.status, pc_requests.created_at
        order by pc_requests.created_at desc
        "), []);

        return view('pc.agent.home', ['requests' => $requests]);
    }

    public function getRequest($id) {
        $request = DB::select(DB::raw("
            select
              pc_requests.id as pc_request_id,
              pc_requests.status as status,
              users.name as user_name,
              pc_amazon_items.id as pc_amazon_item_id,
              pc_amazon_items.product_name as product_name,
              pc_amazon_items.asin as asin,
              pc_amazon_items.image_url as image_url
            from pc_requests
            join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_request_id = pc_requests.id
            join pc_user_amazon_items on pc_user_amazon_items.id = pc_request_user_amazon_items.pc_user_amazon_item_id
            join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
            join users on users.id = pc_user_amazon_items.user_id
            where pc_requests.id = ?
            "), [$id]);
        if(count($request) === 0) {
            return redirect(route('pc_agent.home'));
        }
        return view('pc.agent.request', ['request' => $request]);
    }

    public function getAmazon($id) {
        $amazon = DB::select(DB::raw("
            select * from pc_amazon_items where id = ?
            "), [$id]);
        if(count($amazon) === 0) {
            return redirect(route('pc_agent.home'));
        }
        return view('pc.agent.amazon', ['amazon' => $amazon[0]]);
    }

    public function updateAmazon(Request $request, $id) {
        $data = $request->all();
        $amazon = PcAmazonItem::findOrFail($id);
        $amazon->update([
            'list_price' => $data['list_price'],
            'rank' => $data['rank'],
            'estimated_sales' => $data['estimated_sales'],
            'amazon_fee' => $data['amazon_fee'],
            'number_of_review' => $data['number_of_review']
        ]);
        return redirect(route('pc_agent.home'));
    }

    private function getRequestInfo($id) {
        $requestInfo = DB::select(DB::raw("
            select
              pc_requests.id as pc_request_id,
              pc_requests.status as status,
              users.name as user_name,
              pc_amazon_items.id as pc_amazon_item_id,
              pc_amazon_items.product_name as product_name,
              pc_amazon_items.asin as asin,
              pc_amazon_items.image_url as image_url,
              pc_amazon_items.list_price as amazon_list_price,
              pc_amazon_items.rank as amazon_rank,
              pc_amazon_items.estimated_sales as amazon_estimated_sales,
              pc_amazon_items.amazon_fee as amazon_fee,
              pc_amazon_items.number_of_review as amazon_number_of_review
            from pc_requests
            join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_request_id = pc_requests.id
            join pc_user_amazon_items on pc_user_amazon_items.id = pc_request_user_amazon_items.pc_user_amazon_item_id
            join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
            join users on users.id = pc_user_amazon_items.user_id
            where pc_requests.id = ?
            "), [$id]);

        $rtn = ['requests' => []];

        foreach ($requestInfo as $info) {
            $rtn['pc_request_id'] = $info->pc_request_id;
            $rtn['status'] = $info->status;
            $rtn['user_name'] = $info->user_name;
            $payload = [
                'pc_amazon_item_id' => $info->pc_amazon_item_id,
                'product_name' => $info->product_name,
                'asin' => $info->asin,
                'image_url' => $info->image_url,
                'amazon_list_price' => $info->amazon_list_price,
                'amazon_rank' => $info->amazon_rank,
                'amazon_estimated_sales' => $info->amazon_estimated_sales,
                'amazon_fee' => $info->amazon_fee,
                'amazon_number_of_review' => $info->amazon_number_of_review,
                'alibabaParameters' => []
            ];
            $alibabaParameters = DB::select(DB::raw("
            select * 
            from pc_alibaba_items
            join pc_amazon_item_alibaba_items on pc_amazon_item_alibaba_items.pc_alibaba_item_id = pc_alibaba_items.id
            join pc_amazon_items on pc_amazon_items.id = pc_amazon_item_alibaba_items.pc_amazon_item_id
            where pc_amazon_items.id = ?
            "), [$info->pc_amazon_item_id]);
            foreach ($alibabaParameters as $alibabaParameter) {
                array_push($payload['alibabaParameters'], [
                    'alibaba_url' => $alibabaParameter->alibaba_url,
                    'alibaba_price_max' => $alibabaParameter->alibaba_url,
                    'alibaba_price_min' => $alibabaParameter->alibaba_url,
                    'length' => $alibabaParameter->alibaba_url,
                    'width' => $alibabaParameter->alibaba_url,
                    'height' => $alibabaParameter->alibaba_url,
                    'weight' => $alibabaParameter->alibaba_url,
                    'moq' => $alibabaParameter->alibaba_url,
                    'lead_time' => $alibabaParameter->alibaba_url,
                    'estimated_fba_cost_by_lcl' => $alibabaParameter->alibaba_url,
                    'similarity' => $alibabaParameter->alibaba_url,
                    'potential_opportunity' => $alibabaParameter->alibaba_url,
                ]);
            }
            array_push($rtn['requests'], $payload);
        }

        return $rtn;
    }

}
