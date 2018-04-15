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
        'toilets',
        'banheiros',
        'suites',
        'garagens',
        'area',
        'ar',
        'piscina',
        'churrasqueira',
        'closet',
        'outros',
        'tipo_negociacao',
    ];

    public function tipo() 
    {
        return $this->belongsTo(TipoResidencias::class, 'tipo_residencia');
    }

    public function endereco()
    {
        return $this->belongsTo(Enderecos::class, 'residencia_endereco');
    }
    
}
