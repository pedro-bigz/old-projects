<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model
{
    use SoftDeletes;
    protected $table = 'ofertas';
    protected $fillable = [
        'estoque_id',
        'desconto',
        'description',
        'nivel_id',
        'activated',
        'data_inicio',
        'data_fim',
    ];


    protected $dates = [
        'data_inicio',
        'data_fim',
        'created_at',
        'updated_at',
        'deleted_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['estoque', 'nivel'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/ofertas/'.$this->getKey());
    }

    public function estoque ()
    {
        return $this->belongsTo(Estoque::class, 'estoque_id', 'id');
    }

    public function nivel ()
    {
        return $this->belongsTo(NivelCliente::class, 'nivel_id', 'id');
    }
}
