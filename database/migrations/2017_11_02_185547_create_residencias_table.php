<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->unique()->comment('Codigo de controle da imobiliaria');
            $table->string('header_anuncio')->comment('Header do anuncio');
            $table->text('descricao')->nullable();
            $table->string('imagem')->nullable()->comment('Caminho da imagem no banco de dados');
            $table->date('data_negociacao')->nullable();
            $table->decimal('preco')->nullable();
            $table->integer('quartos')->nullable();
            $table->integer('salas')->nullable();
            $table->integer('banheiros')->nullable();
            $table->integer('suites')->nullable();
            $table->integer('garagens')->nullable();
            $table->integer('area')->nullable()->comment('Tamanho do terreno');
            $table->index(['codigo', 'header_anuncio', 'data_negociacao']);
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
        Schema::dropIfExists('residencias');
    }
}
