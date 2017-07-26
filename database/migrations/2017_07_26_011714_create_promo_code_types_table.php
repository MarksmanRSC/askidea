<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeTypesTable extends Migration
{

    public $tableName = 'promo_code_types';

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

                $table->string('description');
                $table->json('definition');

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
