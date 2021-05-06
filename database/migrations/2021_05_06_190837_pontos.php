<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pontos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pontos', function (Blueprint $table) {
           $table->id();
           $table->string('nome', 60);
           $table->string('endereco', 80);
           $table->float('lat', 10,6);
           $table->float('lng', 10,6);
           $table->string('tipo',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pontos');
    }
}
