<?php

namespace App\Http\Services;

use App\Models\Categoria;

class CategoriaService implements CategoriaServiceInterface
{
    private $model;
    public function __construct(Categoria $model)
    {
        $this->model = $model;
    }

    public function listarCategorias()
    {
        return $this->model->all();
    }
}

