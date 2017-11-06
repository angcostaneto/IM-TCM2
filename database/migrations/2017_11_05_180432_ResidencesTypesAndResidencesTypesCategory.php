<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResidencesTypesAndResidencesTypesCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('residences_types', function($table) {
            $table->integer('residences_types_category')->nullable()->unsigned()->comment('Categoria do tipo de imóvel');
            $table->foreign('residences_types_category')->references('id')->on('residences_types_category');
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
