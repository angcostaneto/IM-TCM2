<?php

use Illuminate\Database\Seeder;

class TipoResidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_residencias')->insert([
            'nome' => "Casa de Vila",
            'tipo_residencia_categoria' => 1
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Casa de Condomínio",
            'tipo_residencia_categoria' => 1
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Apartamento Padrão",
            'tipo_residencia_categoria' => 1
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Cobertura",
            'tipo_residencia_categoria' => 1
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Kitnet",
            'tipo_residencia_categoria' => 1
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Chácara",
            'tipo_residencia_categoria' => 4
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Fazenda",
            'tipo_residencia_categoria' => 4
        ]);

        DB::table('tipo_residencias')->insert([
            'nome' => "Sitio",
            'tipo_residencia_categoria' => 4
        ]);
    }
}
