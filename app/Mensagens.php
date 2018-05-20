<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagens extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'mensagem',
        'id_remetente',
        'id_destinatario',
        'id_residencia',
        'id_conversa',
    ];

    public function conversa() {
        return $this->belongsTo(Conversa::class, 'id_conversa');
    }
}
