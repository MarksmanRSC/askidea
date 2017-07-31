<?php

use App\PcAmazonItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcAmazonItemsTable extends Migration
{
    public $tableName = 'pc_amazon_items';

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
                $table->string('asin')->unique();
                $table->string('image_url', 300);
                $table->string('product_name', 500);
                $table->float('list_price')->nullable();
                $table->integer('rank')->nullable();
                $table->integer('estimated_sales')->nullable();
                $table->float('amazon_fee')->nullable();
                $table->float('number_of_review')->nullable();

                $table->unsignedInteger('update_user_id')->nullable();

                $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

                $table->foreign('update_user_id')
                    ->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('restrict');

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
