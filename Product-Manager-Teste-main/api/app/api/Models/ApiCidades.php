<?php

namespace Api\Models;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class ApiCidades
{
    private $Result;
    private $Dados;

    public function getAll ()
    {
        $listar = new \Api\Models\helper\ApiRead();

        $SQL = "
            SELECT id, nome, total_hab, uf FROM CITYS
            ORDER BY id ASC
        ";

        $listar->read($SQL);
        $this->Result = $listar->getResult();

        return $this->Result;    
    }

    public function getDidade ($id)
    {
        $listar = new \Api\Models\helper\ApiRead();

        $SQL = "
            SELECT id, nome, total_hab, uf FROM CITYS
            WHERE id = :id
        ";

        $listar->read($SQL, "id={$id}");
        $this->Result = $listar->getResult();

        return $this->Result;   
    }
}