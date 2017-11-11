<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealstatesResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realstates_residences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_real_state')->comment('Id da imobiliaria');
            $table->integer('id_residencia')->comment('Id da residência');
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
        Schema::dropIfExists('realstates_residences');
    }
}
