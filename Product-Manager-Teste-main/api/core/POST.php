<?php

class POST
{
    private $UrlController;
    private $Response;

    public function __construct($contoller)
    {
        $this->Response = null;
        $this->UrlController = $contoller;
        $input = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if ($this->UrlController === "Products")
        {
            $estoque = new \Api\Controllers\Products();
            $this->Response = $estoque->cadProduct($input);
        }
        elseif ($this->UrlController === "Auth")
        {
            $auth = new \Api\Controllers\Auth();
            $this->Response = $auth->login ($input);
        }
    }

    public function getResponse()
    {
        return $this->Response;
    }
}

