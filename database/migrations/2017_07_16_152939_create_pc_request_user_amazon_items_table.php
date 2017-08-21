<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcRequestUserAmazonItemsTable extends Migration
{
    public $tableName = 'pc_request_user_amazon_items';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->tableName)) {
            Schema::disableForeignKeyConstraints();
            Schema::create($this->tableName, function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->unsignedInteger('pc_request_id');
                $table->unsignedInteger('agent_user_id')->nullable();
                $table->unsignedInteger('pc_user_amazon_item_id');
                $table->string('status')->default('Pending');

                $table->unique(['pc_request_id', 'pc_user_amazon_item_id'], 'pc_request_user_amazon_items_unique');

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

                $table->foreign('agent_user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('set null');
            });
            Schema::enableForeignKeyConstraints();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
