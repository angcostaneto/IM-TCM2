<?php

use Illuminate\Database\Seeder;

class TipoResidenciasCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_tipo_residencia')->insert([
            'nome' => "Residencial",
        ]);

        DB::table('categoria_tipo_residencia')->insert([
            'nome' => "Residencial",
        ]);

        DB::table('categoria_tipo_residencia')->insert([
            'nome' => "Comercial",
        ]);

        DB::table('categoria_tipo_residencia')->insert([
            'nome' => "Rural",
        ]);
    }
}
