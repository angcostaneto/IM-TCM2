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

    public function type() {
        $this->belongsTo(ResidencesTypes::class);
    }

    public function address()
    {
        return $this->belongsTo(Addresses::class);
    }
    
}
