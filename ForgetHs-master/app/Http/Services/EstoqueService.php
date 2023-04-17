<?php

namespace App\Http\Services;

use App\Models\Estoque;

class EstoqueService implements EstoqueServiceInterface
{
    private $model;

    public function __construct(Estoque $model)
    {
        $this->model = $model;
    }

    public function listarProdutos ()
    {
        return $this->model->all();
    }

    public function listarProdutosAtivos ()
    {
        return $this->model->where('activated', 1)->get();
    }
}

