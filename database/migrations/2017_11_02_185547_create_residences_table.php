<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->comment('Codigo de controle da imobiliaria');
            $table->string('title')->comment('Header do anuncio');
            $table->text('description')->nullable();
            $table->string('image')->comment('Caminho da imagem no banco de dados');
            $table->date('negotiation_date')->nullable();
            $table->decimal('negotiation_price')->nullable();
            $table->integer('toilet')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('suite')->nullable();
            $table->integer('garage')->nullable();
            $table->integer('area')->nullable();
            $table->index(['code', 'title', 'negotiation_date']);
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
        Schema::dropIfExists('residences');
    }
}
