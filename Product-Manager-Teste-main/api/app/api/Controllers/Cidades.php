<?php

namespace Api\Controllers;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class Cidades
{
    private $Dados;

    private function response ($status, $code, $msg, $dados)
    {
        return array(
            "status" => $status,
            "code" => $code,
            "msg" => $msg,
            "data" => $dados
        );
    }

    public function listar ($id = null)
    {
        if ($id)
        {
            $cidades = new \Api\Models\ApiCidades();
            $this->Dados = $cidades->getCidade($id);

            if ($this->Dados)
            {
                return $this->response('success', 200, 'Cidade encontrada com sucesso', $this->Dados);
            }
            else
            {
                return $this->response('error', 404, 'Cidade nao encontrada', []);
            }
        }
        else
        {
            $cidades = new \Api\Models\ApiCidades();
            $this->Dados = $cidades->getAll();

            if ($this->Dados)
            {
                return $this->response('success', 200, 'Cidades encontradas com sucesso', $this->Dados);
            }
            else
            {
                return $this->response('error', 404, 'Nenhuma cidade encontrada', []);
            }
        }
    }
}