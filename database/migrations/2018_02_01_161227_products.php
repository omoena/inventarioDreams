<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('products', function (Blueprint $table) {
              $table->increments('idproduct');
              $table->string('name',80);
              $table->string('serial',50);
              $table->string('description',150);
              $table->string('archive',70);
              $table->string('photo',70);
              $table->string('detail',30);
              $table->string('daterecords',15);
              $table->string('state',15)->after('daterecords');
              $table->string('datereturn',10)->after('state');
              $table->string('delivery',20)->after('datereturn');   
              $table->integer('type_id')->unsigned();
              $table->foreign('type_id')->references('idtype')->on('types')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('provider_id')->unsigned();
              $table->foreign('provider_id')->references('idprovider')->on('providers')->onDelete('cascade')->onUpdate('cascade');
              $table->integer('user_id')->unsigned();
              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
