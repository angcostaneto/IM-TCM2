<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnderecosResidencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('residencias', function($table) {
            $table->integer('residencia_endereco')->nullable()->unsigned()->comment('Endereço da residencia');
            $table->integer('tipo_residencia')->nullable()->unsigned()->comment('Tipo de residencia');
            $table->foreign('residencia_endereco')->references('id')->on('enderecos')->delete('cascade');
            $table->foreign('tipo_residencia')->references('id')->on('tipo_residencias')->delete('cascade');
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
