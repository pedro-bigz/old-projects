<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'forbidden',
        'language',
        'last_login_at',

    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
        'last_login_at',

    ];

    protected $appends = ['resource_url', 'full_name'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/admin-users/'.$this->getKey());
    }

    public function getFullNameAttribute ()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
