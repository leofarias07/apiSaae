<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaltaDeAguasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falta_de_aguas', function (Blueprint $table) {
            $table->increments('idfalta_de_agua');
            $table->string('endereco');
            $table->string('descricao');
            $table->string('contato');
             $table->string('condicao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('falta_de_aguas');
    }
}
