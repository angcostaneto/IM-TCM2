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
        'residences_type',
        'bedroom',
        'image'
    ];

    public function type() 
    {
        return $this->belongsTo(ResidencesTypes::class, 'residences_type');
    }

    public function address()
    {
        return $this->belongsTo(Addresses::class, 'residences_address');
    }
    
}
