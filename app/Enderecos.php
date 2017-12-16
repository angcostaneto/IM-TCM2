<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{

    protected $primaryKey = 'id';

    protected $table = 'enderecos';

    protected $fillable = [
        'rua',
        'bairro',
        'cidade',
        'estado',
        'numero',
        'cep'
    ];
}
