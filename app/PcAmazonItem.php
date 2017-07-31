<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PcAmazonItem extends Model
{
    protected $guarded = [];

    public function pcAlibabaItems() {
        return DB::select(DB::raw("
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
        where pc_amazon_item_alibaba_items.pc_amazon_item_id = ?
        "), [$this->id]);
    }
}
