<?php

use App\PcAmazonItem;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcAmazonItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_amazon_items', function (Blueprint $table) {
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

        PcAmazonItem::insert([
            ['asin' => 'B00U3FPN4U', 'product_name' => 'Amazon Fire TV | Streaming Media Player'],
            ['asin' => 'B000JE9LD4', 'product_name' => 'Belkin 12-Outlet Pivot-Plug Power Strip Surge Protector with 8-Foot Power Cord, 4320 Joules (BP112230-08)'],
            ['asin' => 'B01M1L7V6P', 'product_name' => 'PUMA Men\'s Suede Classic + Fashion Sneaker'],
            ['asin' => 'B00ZQDXQX4', 'product_name' => 'DYNAREX Gauze Sponge 100% Cotton 8-ply 2 x 2" Square (#3222, Sold Per Box)'],
            ['asin' => 'B01DLDD98M', 'product_name' => 'Niangua Furniture Live Edge Hickory Rustic Coffee Table with Copper Pipe Legs - 48" x 23"'],
            ['asin' => 'B017JGIRW0', 'product_name' => 'Pint Glasses - Rustic Moose Beer - Set of Two. Screen Printed Pint Glasses'],
            ['asin' => 'B01L4YK0AA', 'product_name' => 'Deer Throw Pillow - USA Organic Cotton - Sleeping Fawn - Animal Plush - Mocha Brown - Hand-printed Decorative Pillow - Throw Pillow - Woodland Decor - Handmade Cushion - Eco-Friendly'],
            ['asin' => 'B00QW8TYWO', 'product_name' => 'Crossy Road'],
            ['asin' => 'B0051Y1HT8', 'product_name' => 'Mickey Thompson Baja MTZ All-Terrain Radial Tire - LT315/70R17 121Q'],
            ['asin' => 'B00JKS42ZW', 'Christine McGinnis'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pc_amazon_items');
    }
}
