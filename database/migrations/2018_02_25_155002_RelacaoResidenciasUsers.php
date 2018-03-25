<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelacaoResidenciasUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacaoresidenciasusers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('residencia_id')->nullable()->unsigned();
            $table->foreign('residencia_id')->references('id')->on('residencias')->onDelete('set null');;
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('relacaoresidenciasusers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
