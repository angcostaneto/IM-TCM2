<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealStates extends Model
{

    protected $primaryKey = 'id';

    protected $table = 'real_states';

    protected $fillable = [
        'company',
        'trading_name',
        'logo',
        'cnpj',
        'creci',
        'phones',
        'responsable',
        'responsable_email',
        'cep',
        'number'
    ];

    public function address()
    {
        return $this->belongsTo(Addresses::class, 'real_states_address');
    }

}
