<?php

use App\PcUserAmazonItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcUserAmazonItemsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::enableForeignKeyConstraints();

        Schema::create('pc_user_amazon_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pc_amazon_item_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->index(['user_id', 'pc_amazon_item_id']);

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('pc_amazon_item_id')
                ->references('id')->on('pc_amazon_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        PcUserAmazonItem::insert([
            ['user_id' => '1', 'pc_amazon_item_id' => '1'],
            ['user_id' => '1', 'pc_amazon_item_id' => '3'],
            ['user_id' => '1', 'pc_amazon_item_id' => '4'],
            ['user_id' => '1', 'pc_amazon_item_id' => '7'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pc_user_amazon_items');
    }
}
