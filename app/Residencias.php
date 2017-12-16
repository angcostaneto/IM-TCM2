<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residencias extends Model
{

    protected $fillable = [
        'codigo',
        'header_anuncio',
        'descricao',
        'imagem',
        'data_negociacao',
        'preco',
        'quartos',
        'salas',
        'banheiros',
        'suites',
        'garagens',
        'area',
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
