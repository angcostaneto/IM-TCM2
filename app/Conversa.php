<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversa extends Model
{
    protected $table = "conversa";

    protected $fillable = [
        'channel'
    ];
}
