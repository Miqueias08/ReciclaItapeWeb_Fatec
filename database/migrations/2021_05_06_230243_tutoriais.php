<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tutoriais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tutoriais', function (Blueprint $table) {
            $table->increments('id_tutorial');
            $table->string('autor',30);
            $table->string('titulo',200);
            $table->string('subtitulo',30);
            $table->string('imagem',250);
            $table->text('texto');
            $table->string('video')->nullable();
            $table->timestamp('dataHora')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tutoriais');
    }
}
