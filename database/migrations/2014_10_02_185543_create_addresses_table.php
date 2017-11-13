<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street')->comment('Rua');
            $table->string('district')->comment('Bairro');
            $table->string('city')->comment('Cidade');
            $table->string('state')->comment('Estado');
            $table->string('number')->comment('Número');
            $table->string('cep')->comment('CEP');
            $table->index(['cep', 'number', 'state']);
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
        Schema::dropIfExists('addresses');
    }
}
