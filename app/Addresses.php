<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{

    protected $primaryKey = 'id';

    protected $table = 'addresses';

    protected $fillable = [
        'street',
        'district',
        'city',
        'state',
        'number',
        'cep'
    ];

    public function address()
    {
        return $this->belongsTo(RealStates::class);
    }
}
