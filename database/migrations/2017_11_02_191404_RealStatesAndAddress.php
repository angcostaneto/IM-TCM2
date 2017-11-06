<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RealStatesAndAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('real_states', function($table) {
            $table->integer('real_states_address')->nullable()->unsigned()->comment('Endereço da imobiliaria');
            $table->foreign('real_states_address')->references('id')->on('addresses');
        });

        Schema::table('residences', function($table) {
            $table->integer('residences_address')->nullable()->unsigned()->comment('Endereço da residencia');
            $table->integer('residences_type')->nullable()->unsigned()->comment('Tipo de residencia');
            $table->foreign('residences_address')->references('id')->on('addresses');
            $table->foreign('residences_type')->references('id')->on('residences_types');
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
