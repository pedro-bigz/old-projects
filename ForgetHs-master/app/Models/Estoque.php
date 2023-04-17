<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $table = 'estoque';

    protected $fillable = [
        'name',
        'price',
        'amount',
        'place_id',
        'category_id',
        'cor',
        'activated',
        'description',
        'foto',
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['places', 'categoria'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/estoques/'.$this->getKey());
    }

    // public function EstoqueImagensWithRelationships()
    // {
    //     return $this->hasMany(EstoqueImagens::class);
    // }

    public function places ()
    {
        return $this->belongsTo(LojaLocal::class, 'place_id', 'id');
    }

    public function categoria ()
    {
        return $this->belongsTo(Categoria::class, 'category_id', 'id');
    }
}
