<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Outputrecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('outputrecords', function (Blueprint $table) {
              $table->increments('idrecordout');
              $table->string('quantityoutput');
              $table->string('reasonoutput',200);
              $table->string('addresseeout',70);
              $table->string('archiveoutput',50);
              $table->string('dateoutput',10);
              $table->string('dateend',10)->after('dateoutput');
              $table->string('photo',70)->after('dateend');
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
              $table->integer('areapro_id')->unsigned();
              $table->foreign('areapro_id')->references('idareapro')->on('areaproperties')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('entity_id')->unsigned();
              $table->foreign('entity_id')->references('identity')->on('entities')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('group_id')->unsigned();
              $table->foreign('group_id')->references('idgroup')->on('groups')->onDelete('cascade')->onUpdate('cascade');
              
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputrecords');
    }
}
