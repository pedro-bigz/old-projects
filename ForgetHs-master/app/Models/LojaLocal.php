<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LojaLocal extends Model
{
    protected $fillable = [
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'cep',
        'activated',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'full_address', 'description_address'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/loja-locals/'.$this->getKey());
    }

    public function getFullAddressAttribute (): string
    {
        return $this->logradouro . ', ' . $this->numero . ' - ' . $this->cidade;
    }

    public function getDescriptionAddressAttribute (): string
    {
        return $this->logradouro . ', ' . $this->numero;
    }
}
