<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EntregaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas_usuarios', function (Blueprint $table) {
           $table->bigIncrements('id_entrega_usuario');
           $table->float('peso',10,2);
           $table->string('tipo_material');
           $table->unsignedBigInteger('usuario_id');
           $table->unsignedBigInteger('id_cooperativa');
           $table->foreign('usuario_id')->references('id_usuario')->on('usuarios');
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
        Schema::dropIfExists('entregas_usuarios');
    }
}
