<?php

class PUT
{
    private $Response;
    private $UrlParam;

    public function __construct($param)
    {
        $this->UrlParam = $param;
        $_PUT = [];
        parse_str(file_get_contents('php://input'), $_PUT);

        $_PUT = array_keys($_PUT);
        $_PUT = get_object_vars(json_decode($_PUT[0]));

        $_PUT = array_map('strip_tags', $_PUT);
        $_PUT = array_map('trim', $_PUT);
        $_PUT = array_map('htmlspecialchars', $_PUT);
        //$_PUT['desciption'] = str_replace("_"," ", $_PUT['desciption']);

        $estoque = new \Api\Controllers\Products();
        $this->Response = $estoque->edit($this->UrlParam, $_PUT);
    }

    public function getResponse()
    {
        return $this->Response;
    }
}

