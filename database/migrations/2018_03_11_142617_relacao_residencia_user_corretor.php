<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacaoResidenciaUserCorretor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacao_residencia_user_corretor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('residencia_id')->nullable()->unsigned();
            $table->foreign('residencia_id')->references('id')->on('residencias');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('corretor_id')->nullable()->unsigned();
            $table->foreign('corretor_id')->references('id')->on('users');
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
        Schema::dropIfExists('relacao_residencia_user_corretor');
    }
}
