<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Markers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('markers', function (Blueprint $table) {
           $table->id();
           $table->string('name', 60);
           $table->string('address', 80);
           $table->float('lat', 10,6);
           $table->float('lng', 10,6);
           $table->string('type',30);
           $table->boolean('papel');
           $table->boolean('plastico');
           $table->boolean('vidro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markers');
    }
}
