<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'tipo',
        'setor',
        'activated',
        'capa'
    ];

    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url', 'description', 'route'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/categorias/'.$this->getKey());
    }

    public function getDescriptionAttribute (): string
    {
        return $this->tipo . ' - ' . $this->setor;
    }

    public function getRouteAttribute (): string
    {
        return '/produtos/' . str_replace(' ', '_', strtolower($this->tipo));
    }
}
