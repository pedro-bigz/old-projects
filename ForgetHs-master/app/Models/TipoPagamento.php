<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    protected $table = 'tipo_pagamento';

    protected $fillable = [
        'nome',
        'activated',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tipo-pagamentos/'.$this->getKey());
    }
}
