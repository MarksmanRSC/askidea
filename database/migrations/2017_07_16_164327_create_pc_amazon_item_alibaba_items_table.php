<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcAmazonItemAlibabaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_amazon_item_alibaba_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->unsignedInteger('pc_amazon_item_id');
            $table->unsignedInteger('pc_alibaba_item_id');

            $table->float('similarity')->nullable();
            $table->float('potential_opportunity')->nullable();

            $table->unsignedInteger('create_user_id');
            $table->unsignedInteger('update_user_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(['pc_amazon_item_id', 'pc_alibaba_item_id'], 'pc_amazon_item_alibaba_items_index');

            $table->foreign('pc_amazon_item_id')
                ->references('id')->on('pc_amazon_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('pc_alibaba_item_id')
                ->references('id')->on('pc_alibaba_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('create_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('update_user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_amazon_item_alibaba_items');
    }
}