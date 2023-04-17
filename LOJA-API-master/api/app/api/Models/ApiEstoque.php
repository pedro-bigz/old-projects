<?php

namespace Api\Models;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class ApiEstoque
{
    private $Result;
    private $Dados;

    public function getAll ()
    {
        $listar = new \Api\Models\helper\ApiRead();

        $SQL = "
            SELECT pd.id, pd.name, pd.price, ct.nome city, pd.amount, pd.description
            FROM PRODUCTS pd
            INNER JOIN CITYS ct
            ON pd.city = ct.id
            ORDER BY pd.id ASC
        ";

        $listar->read($SQL);
        $this->Result = $listar->getResult();

        return $this->Result;    
    }

    public function getProduct ($id)
    {
        $listar = new \Api\Models\helper\ApiRead();

        $SQL = "
            SELECT pd.id, pd.name, pd.price, ct.nome city, pd.amount, pd.description
            FROM PRODUCTS pd
            INNER JOIN CITYS ct
            ON pd.city = ct.id
            WHERE pd.id = :id
        ";

        $listar->read($SQL, "id={$id}");
        $this->Result = $listar->getResult();

        return $this->Result;   
    }

    public function setProduct ($dados)
    {
        $this->Dados = $dados;
        $this->validateData();

        if ($this->Result)
        {
            $insert = new \Api\Models\helper\ApiWrite();

            $this->Dados['created'] = date("Y-m-d H:i:s");
            $insert->exeWrite("PRODUCTS", $this->Dados);
            $this->Result = $insert->getResult();

            return $this->Result;  
        } 
    }

    private function validateData()
    {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);

        if (in_array('', $this->Dados))
        {
            $this->Result = false;
        }
        else
        {
            $this->Result = true;
        }
    }

    public function removeProduct ($id)
    {
        $listar = new \Api\Models\helper\ApiDelete();

        $SQL = "
            DELETE FROM PRODUCTS
            WHERE id = :id
        ";

        $listar->delete($SQL, "id={$id}");
        $this->Result = $listar->getResult();

        return $this->Result;   
    }

    public function editProduct ($id, array $dados)
    {
        $listar = new \Api\Models\helper\ApiUpdate();

        $this->Dados = $dados;
        $columns = implode(", ", array_map(array($this, 'setColumns'), array_keys($this->Dados)));
        $this->Dados['id'] = (int) $id;

        $SQL = "
            UPDATE PRODUCTS
            SET {$columns}
            WHERE id = :id
        ";

        $listar->update($SQL, $this->Dados);
        $this->Result = $listar->getResult();

        return $this->Result;   
    }

    private function setColumns($item)
    {
        return "{$item}=:{$item}";
    }
}