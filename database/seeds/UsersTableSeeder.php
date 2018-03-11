<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Teste 1',
            'email' => 'teste1@teste.com',
            'password' => bcrypt('123456'),
            'tipo' => 'Admin',
            'rg' => '123456',
            'cpf' => '654321',
        ]);
    }
}
