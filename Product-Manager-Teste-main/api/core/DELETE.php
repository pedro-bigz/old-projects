<?php

class DELETE
{
    private $UrlParam;
    private $Response;

    public function __construct($param)
    {
        $this->UrlParam = $param;
        $estoque = new \Api\Controllers\Products();
        $this->Response = $estoque->delete($this->UrlParam);
    }

    public function getResponse()
    {
        return $this->Response;
    }
}

