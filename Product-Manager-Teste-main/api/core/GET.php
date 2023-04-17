<?php

class GET
{
    private $UrlController;
    private $UrlParam;
    private $Response;
    private $Classe;

    public function __construct($controller, $param)
    {
        $this->Response = null;
        $this->UrlController = $contoller;
        $this->UrlParam = $param;
        $this->Classe = "\\Api\\Controllers\\" . $this->UrlController;
        if (class_exists($this->Classe))
        {
            if ($this->UrlParametro)
            {
                $controller = new $this->Classe;
                $this->Response = $controller->listar($this->UrlParametro);
            }
            else
            {
                $controller = new $this->Classe;
                $this->Response = $controller->listar();
            }
        }
        else
        {
            $this->Response = array('status' => 'error', 'code' => 404, 'dados' => 'Nao encontrado');
        }
    }

    public function getResponse()
    {
        return $this->Response;
    }
}

