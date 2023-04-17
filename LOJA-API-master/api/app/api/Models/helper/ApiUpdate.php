<?php

namespace Api\Models\helper;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

use PDO;

class ApiUpdate extends ApiConn
{
    private $sql;
    private $Values;
    private $Result;
    private $Query;
    private $Dados;
    private $Conn;
    
    function getResult()
    {
        return $this->Result;
    }

    public function fullUpdate($Table, $set, $ParseStr)
    {
        $this->sql = "
            UPDATE {$Table}
            SET {$set}
        ";
        
        if (!empty($ParseStr))
        {
            parse_str($ParseStr, $this->Values);
        }

        $this->exeInstruction();
    }

    public function update($Query, $Values)
    {
        $this->sql = (string) $Query;
        
        if (!empty($Values))
        {
            $this->Values = $Values;
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
        $this->Query->setFetchMode(PDO::FETCH_ASSOC);
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
}

