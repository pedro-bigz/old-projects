<?php

namespace Core;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

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

            if (isset($this->UrlConjunto[0]))
            {
                $this->UrlController = $this->slugController($this->UrlConjunto[0]);
                if ($this->UrlController === 'Auth' && strcasecmp($this->method, 'POST'))
                {
                    $this->UrlController = null;
                }
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

    public function setUrlController($UrlController)
    {
        $this->UrlController = $this->slugController($UrlController);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function checkLogged()
    {
        $logged = new \Api\Controllers\Auth();
        $this->Response = $logged->checkAuth();
        return $this->Response;
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
        $this->Response = null;
        if ($this->UrlController === null || $this->method == null)
        {
            $this->Response = ['status' => 'error', 'code' => 400, 'data' => 'funcionalidade inexistente'];
        }
        else
        {
            $this->{$this->method}(); 
        }

        $this->getResponse ();
    }

    private function get()
    {
        $get = new \GET($this->UrlController, $this->UrlParametro);
        $this->Result = $get->getResponse();
    }

    private function post()
    {
        $post = new \POST($this->UrlController);
        $this->Result = $post->getResponse();
    }

    private function put()
    {
        $put = new \PUT($this->UrlParametro);
        $this->Result = $put->getResponse();
    }

    private function delete()
    {
        $delete = new \DELETE($this->UrlParametro);
        $this->Result = $delete->getResponse();
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