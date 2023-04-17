<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Credenciais_mp extends Model
{
    protected $table = "credenciais_mp";
    protected $fillable = [
        'cliente_mp_id',
        'cliente_mp_secret',
    ];
}

