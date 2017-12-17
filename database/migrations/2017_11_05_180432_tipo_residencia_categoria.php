<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoResidenciaCategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('tipo_residencias', function($table) {
            $table->integer('tipo_residencia_categoria')->nullable()->unsigned()->comment('Categoria do tipo de imóvel');
            $table->foreign('tipo_residencia_categoria')->references('id')->on('categoria_tipo_residencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
