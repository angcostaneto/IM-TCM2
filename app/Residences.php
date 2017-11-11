<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residences extends Model
{

    protected $fillable = [
        'code',
        'title',
        'description',
        'negotiation_price',
        'toilet',
        'bathroom',
        'suite',
        'garage',
        'area',
        'residences_type'
    ];

    public function residence_type() {
        $this->hasOne('App\ResidencesTypes');
    }
}
