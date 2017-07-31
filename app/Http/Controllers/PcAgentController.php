<?php

namespace App\Http\Controllers;

use App\PcAlibabaItem;
use App\PcAmazonItem;
use App\PcRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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

    public function getRequest($request_id) {
        $request = DB::select(DB::raw("
            select
              pc_requests.id as pc_request_id,
              pc_requests.status as status,
              users.name as user_name,
              pc_amazon_items.id as pc_amazon_item_id,
              pc_amazon_items.product_name as product_name,
              pc_amazon_items.asin as asin,
              pc_amazon_items.image_url as image_url,
              pc_request_user_amazon_items.status as amazon_status
            from pc_requests
            join pc_request_user_amazon_items on pc_request_user_amazon_items.pc_request_id = pc_requests.id
            join pc_user_amazon_items on pc_user_amazon_items.id = pc_request_user_amazon_items.pc_user_amazon_item_id
            join pc_amazon_items on pc_amazon_items.id = pc_user_amazon_items.pc_amazon_item_id
            join users on users.id = pc_user_amazon_items.user_id
            where pc_requests.id = ?
            "), [$request_id]);
        if(count($request) === 0) {
            return redirect(route('pc_agent.home'));
        }
        return view('pc.agent.request', ['request' => $request]);
    }

    public function getAmazon($request_id, $amazon_item_id) {
        PcRequest::findOrFail($request_id)->update(['status' => DB::raw("if(status = 'Pending', 'In Progress', if(status = 'Completed', 'Modifying', status))")]);
        DB::update(DB::raw("
        update pc_request_user_amazon_items
        set status = if(status = 'Pending', 'In Progress', if(status = 'Completed', 'Modifying', status))
        where pc_request_id = ? and pc_user_amazon_item_id = (select id from pc_user_amazon_items where pc_amazon_item_id = ? and user_id = ?)
        "), [$request_id, $amazon_item_id, Auth::user()->id]);
        $userRequestAmazonItem = DB::select(DB::raw("
        select * from pc_request_user_amazon_items
        where pc_request_id = ? and pc_user_amazon_item_id = (select id from pc_user_amazon_items where pc_amazon_item_id = ? and user_id = ?) 
        "), [$request_id, $amazon_item_id, Auth::user()->id]);
        if(!$userRequestAmazonItem) {
            throw new \Exception("Item Not Found");
        }
        $amazon = PcAmazonItem::findOrFail($amazon_item_id);
        return view('pc.agent.amazon', ['amazon' => $amazon, 'requestId' => $request_id, 'alibabaItems' => $amazon->pcAlibabaItems(), 'userRequestAmazonItem' => $userRequestAmazonItem[0], 'view' => false]);
    }

    public function viewAmazon($request_id, $amazon_item_id) {
        $userRequestAmazonItem = DB::select(DB::raw("
        select * from pc_request_user_amazon_items
        where pc_request_id = ? and pc_user_amazon_item_id = (select id from pc_user_amazon_items where pc_amazon_item_id = ? and user_id = ?) 
        "), [$request_id, $amazon_item_id, Auth::user()->id]);
        if(!$userRequestAmazonItem) {
            throw new \Exception("Item Not Found");
        }
        $amazon = PcAmazonItem::findOrFail($amazon_item_id);
        return view('pc.agent.amazon', ['amazon' => $amazon, 'requestId' => $request_id, 'alibabaItems' => $amazon->pcAlibabaItems(), 'userRequestAmazonItem' => $userRequestAmazonItem[0], 'view' => true]);
    }

    public function updateAmazon(Request $request, $request_id, $amazon_item_id) {
        $this->validate($request, [
            'list_price' => 'nullable|numeric',
            'rank' => 'nullable|numeric',
            'estimated_sales' => 'nullable|numeric',
            'amazon_fee' => 'nullable|numeric',
            'number_of_review' => 'nullable|numeric',
        ]);
        $amazon = PcAmazonItem::findOrFail($amazon_item_id);
        $amazon->update([
            'list_price' => Input::get('list_price'),
            'rank' => Input::get('rank'),
            'estimated_sales' => Input::get('estimated_sales'),
            'amazon_fee' => Input::get('amazon_fee'),
            'number_of_review' => Input::get('number_of_review')
        ]);
        return redirect(route('pc_agent.amazon', ['requestId' => $request_id, 'amazon_item_id' => $amazon_item_id]));
    }

    public function markAmazonCompleted($request_id, $amazon_item_id) {
        DB::update(DB::raw("
        update pc_request_user_amazon_items
        set status = 'Completed'
        where pc_request_id = ? and pc_user_amazon_item_id = (select id from pc_user_amazon_items where pc_amazon_item_id = ? and user_id = ?)
        "), [$request_id, $amazon_item_id, Auth::user()->id]);

        DB::update(DB::raw("
        update pc_requests
        set status = if(
          (select count(1) 
            from pc_request_user_amazon_items 
            where pc_request_id = ? 
              and pc_request_user_amazon_items.status <> 'Completed') = 0, 
          'Completed', 
          status)
        where pc_requests.id = ?
        "), [$request_id, $request_id]);
        return redirect(route('pc_agent.request', ['request_id' => $request_id]));
    }

    public function getLinkAlibabaItem($request_id, $amazon_item_id) {
        $re = DB::select(DB::raw("
        select pc_amazon_item_alibaba_items.pc_alibaba_item_id 
         from pc_amazon_item_alibaba_items 
         where pc_amazon_item_alibaba_items.pc_amazon_item_id = ?           
        "), [$amazon_item_id]);
        $ids = array_map(function($data) { return $data->pc_alibaba_item_id; }, $re);
        $alibabaItems = PcAlibabaItem::whereNotIn('id', $ids)->get();
        return view('pc.agent.alibaba_link', ['requestId' => $request_id, 'amazonItemId' => $amazon_item_id, 'alibabaItems' => $alibabaItems]);
    }

    public function storeLinkAlibabaItem(Request $request, $request_id, $amazon_item_id) {
        $this->validate($request, [
            'pc_alibaba_item_id' => 'required|integer',
            'similarity' => 'required|numeric',
            'potential_opportunity' => 'required|numeric',
        ]);
        DB::insert(DB::raw("
        insert into pc_amazon_item_alibaba_items(pc_amazon_item_id, pc_alibaba_item_id, similarity, potential_opportunity, create_user_id, update_user_id) 
        values (?, ?, ?, ?, ?, ?);
        "), [$amazon_item_id, Input::get('pc_alibaba_item_id'), Input::get('similarity'), Input::get('potential_opportunity'), Auth::user()->id, Auth::user()->id]);

        return redirect(route('pc_agent.amazon', ['request_id' => $request_id, 'amazon_item_id' => $amazon_item_id]));
    }

    public function createAlibabaItem($request_id, $amazon_item_id) {
        return view('pc.agent.alibaba_create', ['requestId' => $request_id, 'amazonItemId' => $amazon_item_id]);
    }

    public function storeAlibabaItem(Request $request, $request_id, $amazon_item_id) {
        $this->validate($request, [
            'alibaba_url' => 'required|url',
            'alibaba_price_max' => 'nullable|numeric',
            'alibaba_price_min' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'moq' => 'nullable|numeric',
            'lead_time' => 'nullable|numeric',
            'estimated_fba_cost_by_lcl' => 'nullable|numeric',
            'similarity' => 'required|numeric',
            'potential_opportunity' => 'required|numeric',
        ]);

        $alibabaItem = PcAlibabaItem::create([
            'alibaba_url' => Input::get('alibaba_url'),
            'alibaba_price_max' => Input::get('alibaba_price_max'),
            'alibaba_price_min' => Input::get('alibaba_price_min'),
            'length' => Input::get('length'),
            'width' => Input::get('width'),
            'height' => Input::get('height'),
            'weight' => Input::get('weight'),
            'moq' => Input::get('moq'),
            'lead_time' => Input::get('lead_time'),
            'estimated_fba_cost_by_lcl' => Input::get('estimated_fba_cost_by_lcl'),
            'create_user_id' => Auth::user()->id,
            'update_user_id' => Auth::user()->id,
        ]);
        DB::update(DB::raw("
        insert into pc_amazon_item_alibaba_items(pc_amazon_item_id, pc_alibaba_item_id, similarity, potential_opportunity, create_user_id, update_user_id) 
        values (?, ?, ?, ?, ?, ?);
        "), [$amazon_item_id, $alibabaItem->id, Input::get('similarity'), Input::get('potential_opportunity'), Auth::user()->id, Auth::user()->id]);
        return redirect(route('pc_agent.amazon', ['request_id' => $request_id, 'amazon_item_id' => $amazon_item_id]));
    }

    public function editAlibabaItem($request_id, $amazon_item_id, $alibaba_item_id) {
        $alibabaItem = DB::select(DB::raw("
        select
          pc_alibaba_items.id, pc_alibaba_items.alibaba_url, pc_alibaba_items.alibaba_price_max, 
          pc_alibaba_items.alibaba_price_min, pc_alibaba_items.length, pc_alibaba_items.width, 
          pc_alibaba_items.height, pc_alibaba_items.weight, pc_alibaba_items.moq, pc_alibaba_items.lead_time, 
          pc_alibaba_items.estimated_fba_cost_by_lcl, pc_alibaba_items.create_user_id, 
          pc_alibaba_items.update_user_id, pc_alibaba_items.created_at, 
          if (pc_alibaba_items.updated_at > pc_amazon_item_alibaba_items.updated_at, pc_alibaba_items.updated_at, pc_amazon_item_alibaba_items.updated_at) as updated_at, 
          pc_amazon_item_alibaba_items.similarity, pc_amazon_item_alibaba_items.potential_opportunity
        from pc_alibaba_items
        join pc_amazon_item_alibaba_items on pc_amazon_item_alibaba_items.pc_alibaba_item_id = pc_alibaba_items.id
        where pc_alibaba_items.id = ?
        "), [$alibaba_item_id]);
        if(count($alibabaItem) === 0) {
            return redirect()->back();
        } else {
            $alibabaItem = $alibabaItem[0];
        }
        return view('pc.agent.alibaba_edit', [
            'requestId' => $request_id,
            'amazonItemId' => $amazon_item_id,
            'alibabaItem' => $alibabaItem
        ]);
    }

    public function updateAlibabaItem(Request $request, $request_id, $amazon_item_id, $alibaba_item_id) {
        $this->validate($request, [
            'alibaba_url' => 'required|url',
            'alibaba_price_max' => 'nullable|numeric',
            'alibaba_price_min' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'moq' => 'nullable|numeric',
            'lead_time' => 'nullable|numeric',
            'estimated_fba_cost_by_lcl' => 'nullable|numeric',
            'similarity' => 'required|numeric',
            'potential_opportunity' => 'required|numeric',
        ]);
        $alibabaItem = PcAlibabaItem::findOrFail($alibaba_item_id);
        $alibabaItem->update([
            'alibaba_url' => Input::get('alibaba_url'),
            'alibaba_price_max' => Input::get('alibaba_price_max'),
            'alibaba_price_min' => Input::get('alibaba_price_min'),
            'length' => Input::get('length'),
            'width' => Input::get('width'),
            'height' => Input::get('height'),
            'weight' => Input::get('weight'),
            'moq' => Input::get('moq'),
            'lead_time' => Input::get('lead_time'),
            'estimated_fba_cost_by_lcl' => Input::get('estimated_fba_cost_by_lcl'),
            'update_user_id' => Auth::user()->id,
        ]);
        DB::update(DB::raw("
        update pc_amazon_item_alibaba_items
        set similarity = ?, potential_opportunity = ?
        where pc_alibaba_item_id = ? and pc_amazon_item_id = ?
        "), [Input::get('similarity'), Input::get('potential_opportunity'), $alibaba_item_id, $amazon_item_id]);
        return redirect(route('pc_agent.amazon', ['request_id' => $request_id, 'amazon_item_id' => $amazon_item_id]));
    }

    public function deleteAlibabaItem($request_id, $amazon_item_id, $alibaba_item_id) {
        DB::update(DB::raw("
        delete from pc_amazon_item_alibaba_items where pc_alibaba_item_id = ? and pc_amazon_item_id = ?
        "), [$alibaba_item_id, $amazon_item_id]);
        return redirect(route('pc_agent.amazon', ['request_id' => $request_id, 'amazon_item_id' => $amazon_item_id]));
    }

}
