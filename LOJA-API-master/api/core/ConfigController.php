<?php

namespace Core;

class ConfigController
{
	private $Url;
    private $UrlConjunto;
    private $UrlController;
    private $UrlParametro;
    private $method;
    private $Classe;
    private $Paginas;
    private static $Format;
    private $Response;

    public function __construct()
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
        if ($url)
        {
            $this->Url = $url;
            $this->cleanUrl();
            $this->UrlConjunto = explode("/", $this->Url);

            if (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']))
            {
                $this->method = strtolower($_SERVER['REQUEST_METHOD']);
            }
            else
            {
                $this->method = null;
            }

            if (isset($this->UrlConjunto[1]))
            {
                $this->UrlParametro = $this->slugMetodo($this->UrlConjunto[1]);
            }
            else
            {
                $this->UrlParametro = null;
            }

            if (isset($this->UrlConjunto[0]))
            {
                $this->UrlController = $this->slugController($this->UrlConjunto[0]);
            }
            else
            {
                $this->UrlController = null;
            }

            if (isset($this->UrlConjunto[1]))
            {
                $this->UrlParametro = $this->slugMetodo($this->UrlConjunto[1]);
            }
            else
            {
                $this->UrlParametro = null;
            }
        }
        else
        {
            $this->UrlController = null;
            $this->UrlParametro = null;
        }
    }

    private function cleanUrl()
    {
        //Eliminar as tags
        $this->Url = strip_tags($this->Url);
        //Eliminar espaços em branco
        $this->Url = trim($this->Url);
        //Eliminar a barra no final da URL
        $this->Url = rtrim($this->Url, "/");

        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->Url = strtr(utf8_decode($this->Url), utf8_decode(self::$Format['a']), self::$Format['b']);
    }

    public function slugController($SlugController)
    {
        return str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($SlugController)))));
    }

    public function slugMetodo($SlugMetodo)
    {       
        return lcfirst($this->slugController($SlugMetodo));
    }

    public function load()
    {
        if ($this->UrlController === null || $this->method == null)
        {
            $this->Response = array('status' => 'error', 'code' => 400, 'data' => 'funcionalidade inexistente');
            $this->getResponse ();
            return;
        }

        $this->{$this->method}(); 
        $this->getResponse ();
    }

    private function get()
    {
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

    private function post()
    {
        $estoque = new \Api\Controllers\Products();
        $this->Response = $estoque->cadProduct(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    }

    private function put()
    {
        $_PUT = [];
        parse_str(file_get_contents('php://input'), $_PUT);

        $_PUT = array_keys($_PUT);
        $_PUT = get_object_vars(json_decode($_PUT[0]));

        $_PUT = array_map('strip_tags', $_PUT);
        $_PUT = array_map('trim', $_PUT);
        $_PUT = array_map('htmlspecialchars', $_PUT);
        //$_PUT['desciption'] = str_replace("_"," ", $_PUT['desciption']);

        $estoque = new \Api\Controllers\Products();
        $this->Response = $estoque->edit($this->UrlParametro, $_PUT);
    }

    private function delete()
    {
        $estoque = new \Api\Controllers\Products();
        $this->Response = $estoque->delete($this->UrlParametro);
    }

    public function getResponse ()
    {
        if (!strcasecmp($this->Response['status'], "error") || $this->Response['code'] != 200)
        {
            http_response_code((int) $this->Response['code']);
        }

        if($jsonObj = json_encode($this->Response))
        {
            echo $jsonObj;
        }
        else
        {
            http_response_code(500);
            echo "error encoding response";   
        }        
    }
}