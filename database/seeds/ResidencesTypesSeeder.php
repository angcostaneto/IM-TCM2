<?php

use Illuminate\Database\Seeder;

class ResidencesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residences_types')->insert([
            'name' => "Casa de Vila",
            'residences_types_category' => 1
        ]);

        DB::table('residences_types')->insert([
            'name' => "Casa de Condomínio",
            'residences_types_category' => 1
        ]);

        DB::table('residences_types')->insert([
            'name' => "Apartamento Padrão",
            'residences_types_category' => 1
        ]);

        DB::table('residences_types')->insert([
            'name' => "Cobertura",
            'residences_types_category' => 1
        ]);

        DB::table('residences_types')->insert([
            'name' => "Kitnet",
            'residences_types_category' => 1
        ]);

        DB::table('residences_types')->insert([
            'name' => "Chácara",
            'residences_types_category' => 4
        ]);

        DB::table('residences_types')->insert([
            'name' => "Fazenda",
            'residences_types_category' => 4
        ]);

        DB::table('residences_types')->insert([
            'name' => "Sitio",
            'residences_types_category' => 4
        ]);
    }
}
