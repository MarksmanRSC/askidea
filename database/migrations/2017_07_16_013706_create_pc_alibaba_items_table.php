<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcAlibabaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pc_alibaba_items', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('alibaba_url', '2000');
            $table->float('alibaba_price_max')->nullable();
            $table->float('alibaba_price_min')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('moq')->nullable();
            $table->float('lead_time')->nullable();
            $table->float('estimated_fba_cost_by_air')->nullable();
            $table->float('estimated_fba_cost_by_lcl')->nullable();
            $table->float('max_roi')->nullable();
            $table->float('min_roi')->nullable();

            $table->unsignedInteger('create_user_id');
            $table->unsignedInteger('update_user_id');

            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('pc_alibaba_items');
    }
}
