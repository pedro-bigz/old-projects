<?php

namespace Api\Models\helper;

if (!defined("URL")) {
    header("Location: /");
    exit();
}

use PDO;

class ApiWrite extends ApiConn
{
    private $Sql;
    private $Tabela;
    private $Dados;
    private $Result;
    private $Query;
    private $Conn;

    public function exeWrite($tabela, array $dados)
    {
        $this->Tabela = (string) $tabela;
        $this->Dados = $dados;

        $columns = implode(", ", array_keys($this->Dados));
        $values = ":" . implode(", :", array_keys($this->Dados));

        $this->Sql = "INSERT INTO {$this->Tabela} ({$columns}) VALUES ({$values})";

        $this->exeInstruction();
    }

    private function getInstruction()
    {
        if ($this->Dados)
        {
            foreach ($this->Dados as $link => $value)
            {
                $this->Query->bindValue(":{$link}", $value, PDO::PARAM_STR);
            }
        }
    }

    private function exeInstruction()
    {
        $this->connection();

        try
        {
            $this->getInstruction();
            $this->Query->execute();
            $this->Result = $this->Conn->lastInsertId();
        }
        catch (Exception $e)
        {
            $this->Result = null;
        }
    }

    private function connection()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Sql);
    }

    public function getResult()
    {
        return $this->Result;
    }
}
