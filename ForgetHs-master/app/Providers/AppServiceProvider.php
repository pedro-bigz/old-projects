<?php

namespace App\Providers;

use App\Http\Services\CategoriaService;
use App\Http\Services\CategoriaServiceInterface;
use App\Http\Services\ClienteService;
use App\Http\Services\ClienteServiceInterface;
use App\Http\Services\DeviceService;
use App\Http\Services\DeviceServiceInterface;
use App\Http\Services\EstoqueService;
use App\Http\Services\EstoqueServiceInterface;
use App\Http\Services\LojaService;
use App\Http\Services\LojaServiceInterface;
use App\Http\Services\NivelClienteService;
use App\Http\Services\NivelClienteServiceInterface;
use App\Http\Services\NavbarService;
use App\Http\Services\NavbarServiceInterface;
use App\Http\Services\UserService;
use App\Http\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(DeviceServiceInterface::class, DeviceService::class);
        $this->app->bind(LojaServiceInterface::class, LojaService::class);
        $this->app->bind(CategoriaServiceInterface::class, CategoriaService::class);
        $this->app->bind(EstoqueServiceInterface::class, EstoqueService::class);
        $this->app->bind(ClienteServiceInterface::class, ClienteService::class);
        $this->app->bind(NivelClienteServiceInterface::class, NivelClienteService::class);
        $this->app->bind(NavbarServiceInterface::class, NavbarService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
