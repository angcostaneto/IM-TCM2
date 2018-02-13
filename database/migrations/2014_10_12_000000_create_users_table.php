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
            $table->enum('tipo', ['admin', 'superadmin', 'corretor', 'vistoriador', 'cliente', 'corretor']);
            $table->string('foto')->nullable();
            $table->string('rg');
            $table->string('cpf')->unique();
            $table->integer('user_endereco')->nullable()->unsigned()->comment('Endereço do usuário');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::table('users', function($table) {
            $table->foreign('user_endereco')->references('id')->on('enderecos');
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
