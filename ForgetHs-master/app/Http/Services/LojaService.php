<?php

namespace App\Http\Services;

use App\Models\LojaLocal;

class LojaService implements LojaServiceInterface
{
    private $model;
    public function __construct (LojaLocal $model)
    {
        $this->model = $model;
    }

    public function listarLocais()
    {
        return $this->model->all();
    }
}

