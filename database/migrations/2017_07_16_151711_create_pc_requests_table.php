<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcRequestsTable extends Migration
{
    public $tableName = 'pc_requests';

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
                $table->unsignedInteger('user_id');
                $table->unsignedInteger('agent_user_id')->nullable();
                $table->string('status')->default("Pending");

                $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

                $table->foreign('user_id')
                    ->references('id')->on('users')
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
