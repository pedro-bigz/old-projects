<?php

namespace App\Models;

use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $table = "clientes";
    protected $fillable = [
        'registro_cliente',
        'telefone',
        'celular',
        'data_nascimento',
        'nivel_id',
        'user_id',
    ];


    protected $dates = [
        'data_nascimento',
        'deleted_at',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];
    protected $with = ['user', 'nivel'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/'.$this->getKey());
    }

    public function user ()
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function nivel ()
    {
        return $this->belongsTo(NivelCliente::class, 'nivel_id', 'id');
    }
}
