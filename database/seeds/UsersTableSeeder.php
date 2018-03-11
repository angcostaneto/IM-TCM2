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
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => bcrypt('123456'),
            'tipo' => 'superadmin',
            'rg' => '123456',
            'cpf' => '654321',
        ]);
    }
}
