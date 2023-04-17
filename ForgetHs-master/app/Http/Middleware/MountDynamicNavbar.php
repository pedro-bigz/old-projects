<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Services\NavbarServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class MountDynamicNavbar
{
    private $navbarService;

    public function __construct(NavbarServiceInterface $navbarService)
    {
        $this->navbarService = $navbarService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $redes_sociais = $this->navbarService->listarRedesSociaisAtivas ();
        $categorias = $this->navbarService->listarCategoriasAtivas ();

        View::share("redes_sociais", $redes_sociais);
        View::share("categorias", $categorias);

        return $next($request);
    }
}
