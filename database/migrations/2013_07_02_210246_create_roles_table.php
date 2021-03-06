<?php

use App\Role;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    public $tableName = 'roles';

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
                $table->string('name')->unique();
                $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });
            Schema::enableForeignKeyConstraints();
        }

        Role::create(['name' => 'Administrator', 'id' => 1]);
        Role::create(['name' => 'Agent', 'id' => 2]);
        Role::create(['name' => 'Gold Member', 'id' => 3]);
        Role::create(['name' => 'Silver Member', 'id' => 4]);
        Role::create(['name' => 'Normal Member', 'id' => 999]);
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
