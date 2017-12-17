<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imobiliaria extends Model
{

    protected $primaryKey = 'id';

    protected $table = 'imobiliaria';

    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'logo',
        'cnpj',
        'creci',
        'telefones',
        'responsavel',
        'responsavel_email',
        'cep',
        'numero'
    ];

    public function endereco()
    {
        return $this->belongsTo(Enderecos::class, 'imobiliaria_endereco');
    }

}
