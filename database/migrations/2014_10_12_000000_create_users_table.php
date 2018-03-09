<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
             $table->string('fullname');
            $table->string('email')->unique();
            $table->string('blockade')->after('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('idposition')->on('positions')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('iddepartment')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
