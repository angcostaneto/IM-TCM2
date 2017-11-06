<?php

use Illuminate\Database\Seeder;

class ResidencesTypesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('residences_types_category')->insert([
            'name' => "Residencial",
        ]);

        DB::table('residences_types_category')->insert([
            'name' => "Residencial",
        ]);

        DB::table('residences_types_category')->insert([
            'name' => "Comercial",
        ]);

        DB::table('residences_types_category')->insert([
            'name' => "Rural",
        ]);
    }
}
