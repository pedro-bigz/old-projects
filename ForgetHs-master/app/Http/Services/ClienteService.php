<?php

namespace App\Http\Services;

use App\Models\Cliente;

class ClienteService implements ClienteServiceInterface
{
    private $model;
    /**
     * Class constructor.
     */
    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function clienteAutoRegister ()
    {
        return '1112';
    }

    public function getUserByClienteId ($clienteId)
    {
        $cliente = $this->model->where('id', $clienteId)->get()->first();
        return $cliente->user;
    }
}

