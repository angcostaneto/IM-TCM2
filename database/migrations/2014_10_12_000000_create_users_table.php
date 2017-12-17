<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('type');
            $table->string('photo')->nullable();
            $table->string('rg');
            $table->string('cpf')->unique();
            $table->integer('user_address')->nullable()->unsigned()->comment('Endereço do usuário');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::table('users', function($table) {
            $table->foreign('user_address')->references('id')->on('enderecos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
