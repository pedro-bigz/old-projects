<?php

namespace Api\Models\helper;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

use PDO;

class ApiDelete extends ApiConn
{
    private $Sql;
    private $Tabela;
    private $Dados;
    private $Result;
    private $Query;
    private $Conn;

    public function delete($Query, $ParseStr = null)
    {
        $this->sql = (string) $Query;
        
        if (!empty($ParseStr))
        {
            parse_str($ParseStr, $this->Values);
        }

        $this->exeInstruction();
    }

    private function exeInstruction()
    {
        $this->connection();
        
        try
        {
            $this->getInstruction();
            $this->Query->execute();
            $this->Result = true;
        }
        catch (Exception $e)
        {
            $this->Result = false;
        }
    }
    
    private function connection()
    {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->sql);
    }
    
    private function getInstruction()
    {
        if ($this->Values)
        {
            foreach ($this->Values as $link => $value)
            {
                if ($link == 'limit' || $link == 'offset')
                {
                    $value = (int) $value;
                }
                
                $this->Query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }

    public function getResult()
    {
        return $this->Result;
    }
}