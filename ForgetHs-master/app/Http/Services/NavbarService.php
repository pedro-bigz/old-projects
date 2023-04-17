<?php

namespace App\Http\Services;

use App\Models\RedesSociai;
use App\Models\Categoria;

class NavbarService implements NavbarServiceInterface
{
    private $redes_sociais;
    private $categorias;

    public function __construct(RedesSociai $redes_sociais, Categoria $categorias)
    {
        $this->redes_sociais = $redes_sociais;
        $this->categorias = $categorias;
    }

    public function listarRedesSociaisAtivas ()
    {
        return $this->redes_sociais->where('activated', 1)->get();
    }

    public function listarCategoriasAtivas ()
    {
        return $this->categorias->where('activated', 1)->get();
    }
}

