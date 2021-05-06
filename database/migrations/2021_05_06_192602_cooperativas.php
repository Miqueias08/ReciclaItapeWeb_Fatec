<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cooperativas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooperativas', function (Blueprint $table) {
           $table->bigIncrements('id_cooperativa');
           $table->string('razao_social',90);
           $table->string('tipo_documento', 40);
           $table->string('cnpj', 19)->nullable();
           $table->string('cpf',14)->nullable();
           $table->string('endereco',100);
           $table->float('lat',10,6);
           $table->float('lng',10,6);
           $table->text('descricao');
           $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cooperativas');
    }
}
