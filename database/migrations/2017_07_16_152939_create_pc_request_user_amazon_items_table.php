<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcRequestUserAmazonItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_request_user_amazon_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('pc_request_id');
            $table->unsignedInteger('pc_user_amazon_item_id');
            $table->string('status')->default('Pending');

            $table->index(['pc_request_id', 'pc_user_amazon_item_id'], 'pc_request_user_amazon_items_index');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('pc_request_id')
                ->references('id')->on('pc_requests')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('pc_user_amazon_item_id')
                ->references('id')->on('pc_user_amazon_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_request_user_amazon_items');
    }
}
