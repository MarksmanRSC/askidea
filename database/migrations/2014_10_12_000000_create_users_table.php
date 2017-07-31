<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public $tableName = 'users';

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
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->unsignedInteger('role_id')->default(999);
                $table->rememberToken();
                $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
                $table->unsignedInteger('pc_limit')->default(0);
                $table->dateTime('role_expired_at')->nullable();
                $table->foreign('role_id')
                    ->references('id')->on('roles')
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
