<?php

namespace Api\Models;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class ApiAuth
{
    private $Email;
    private $Password;
    private $Result;
    private $Dados;

    public function auth ($dados)
    {
        $this->Dados = $dados;
        $this->Dados['email'] = $this->validateEmail();

        $listar = new \Api\Models\helper\ApiRead();

        $SQL = "
            SELECT id, name, pwd
            FROM USERS
            WHERE email = :email
        ";

        $listar->read($SQL, "email={$this->Dados['email']}");
        $this->Result = $listar->getResult();        

        return $this->validatePassword();    
    }

    private function validateEmail ()
    {
        return filter_var($this->Dados['email'], FILTER_VALIDATE_EMAIL);
    }

    private function validatePassword ()
    {
        if (password_verify($this->Dados['pwd'], $this->Result[0]['pwd']))
        {
            return $this->Result[0];
        }
        else
        {
            return false;
        }
    }
}