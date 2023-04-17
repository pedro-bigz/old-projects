<?php

namespace App\Http\Services;

use Brackets\AdminAuth\Models\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserService implements UserServiceInterface
{
    private $model;

    public function __construct(AdminUser $model)
    {
        $this->model = $model;
    }

    public function isAdministrator ()
    {
        $role = Config::get('constants.options')['ROLE_ADMINISTRADOR_NAME'];
        return Auth::user()->getRoleNames()->contains($role);
    }

    public function isModerador ()
    {
        $role = Config::get('constants.options')['ROLE_MODERADOR_NAME'];
        return Auth::user()->getRoleNames()->contains($role);
    }

    public function isCliente ()
    {
        $role = Config::get('constants.options')['ROLE_CLIENTE_NAME'];
        return Auth::user()->getRoleNames()->contains($role);
    }
}

