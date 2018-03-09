<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inputrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputrecords', function (Blueprint $table) {
              $table->increments('idrecordin');
              $table->string('quantityinput');
              $table->string('reasoninput',200);
              $table->string('addresseein',70);
              $table->string('placeinput',60);
              $table->string('archiveinput',50);
              $table->string('dateinput',10);
              $table->string('photo',70)->after('dateinput');
              $table->integer('product_id')->unsigned();
              $table->foreign('product_id')->references('idproduct')->on('products')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('location_id')->unsigned();
              $table->foreign('location_id')->references('idlocation')->on('locations')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('user_id')->unsigned();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('state_id')->unsigned();
              $table->foreign('state_id')->references('idstate')->on('states')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('city_id')->unsigned();
              $table->foreign('city_id')->references('idcity')->on('cities')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inputrecords');
    }
}
