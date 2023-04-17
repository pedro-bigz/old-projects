<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedesSociai extends Model
{
    protected $fillable = [
        'nome',
        'url',
        'icon',
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
        return url('/admin/redes-sociais/'.$this->getKey());
    }
}
