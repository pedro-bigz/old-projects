<?php

namespace App\Http\Services;

use App\Models\NivelCliente;

class NivelClienteService implements NivelClienteServiceInterface
{
    private $model;

    public function __construct(NivelCliente $nivelCliente)
    {
        $this->model = $nivelCliente;
    }

    public function listarClienteNiveis ()
    {
        return $this->model->all();
    }
}

