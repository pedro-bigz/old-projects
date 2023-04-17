<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NivelCliente extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'description',
    
    ];
    
    
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/nivel-clientes/'.$this->getKey());
    }
}
