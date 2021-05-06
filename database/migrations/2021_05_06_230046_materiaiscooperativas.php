<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Materiaiscooperativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('materiais_cooperativas', function (Blueprint $table) {
           $table->bigIncrements('id_material');
           $table->string('categoria',90);
           $table->string('icone', 40);
            $table->unsignedBigInteger('id_cooperativa');
           $table->foreign('id_cooperativa')->references('id_cooperativa')->on('cooperativas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiais_cooperativas');
    }
}
