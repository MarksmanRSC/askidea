<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{

    public $tableName = 'promo_codes';

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

                $table->unsignedInteger('promo_code_type_id');
                $table->string('promo_code')->unique();

                $table->tinyInteger('remaining_quantity')->default(1)->nullable();
                $table->tinyInteger('is_reusable')->default(0);

                $table->unsignedInteger('create_user_id');
                $table->unsignedInteger('update_user_id');

                $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

                $table->foreign('promo_code_type_id')
                    ->references('id')->on('promo_code_types')
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
        Schema::dropIfExists('promo_codes');
    }
}
