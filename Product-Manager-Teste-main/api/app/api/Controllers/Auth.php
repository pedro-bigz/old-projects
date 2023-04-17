<?php

namespace Api\Controllers;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class Auth {
	private $Input;
	private $Password;
    private $Result;
    private $header;
    private $payload;
    private $sign;
	private $token;
	
	public function __construct()
	{
		$this->Password = 'VegeAVilagnakSong';
	}

    private function response ($status, $code, $msg, $dados)
    {
        return array(
            "status" => $status,
            "code" => $code,
            "msg" => $msg,
            "data" => $dados
        );
    }

    public function login ($dados)
    {
		$this->Input = $dados;
    	$this->validateUser();

    	if ($this->Result)
    	{
	        // header token
	        $this->header = [
	            'typ' => 'JWT',
	            'alg' => 'HS256'
	        ];

	        // Payload - Content
	        $this->payload = [
	        	'id' => $this->Result['id'],
	            'name' => $this->Result['name'],
	            'email' => $this->Result['email']
	        ];

	        $this->header 	= json_encode($this->header);
	        $this->payload 	= json_encode($this->payload);

	        $this->header 	= $this->base64UrlEncode($this->header);
	        $this->payload 	= $this->base64UrlEncode($this->payload);

	        $this->sign 	= hash_hmac('sha256', "{$this->header}.{$this->payload}", $this->Password, true);
	        $this->sign 	= $this->base64UrlEncode($this->sign);

			$this->token = "{$this->header}.{$this->payload}.{$this->sign}";
			
	        return $this->response('success', 200, 'Logado com sucesso!', $this->token);
	    }

	    return $this->response('error', 404, 'Erro na verificação!', false);
    }

    private function validateUser ()
    {
    	$auth = new \Api\Models\ApiAuth();
    	$this->Result = $auth->auth($this->Input);

    	if ($this->Result)
    	{
	    	$this->Result['email'] = $this->Input['email'];
	    }
    }

    public function checkAuth ()
    {
		$http_header = \apache_request_headers();

		if (isset($http_header['Authorization']) && !empty($http_header['Authorization']))
		{
			$bearer = explode(' ', $http_header['Authorization']);
			$token = explode('.', $bearer[1]);

			if (count($token) != 3)
			{
				return $this->response('error', 403, 'Erro na autenticação!', false);
			}

			$this->header 	= $token[0];
			$this->payload 	= $token[1];
			$this->sign 	= $token[2];

			$valid 	= hash_hmac('sha256', "{$this->header}.{$this->payload}", $this->Password, true);
			$valid 	= $this->base64UrlEncode($valid);

			if ($this->sign === $valid)
			{
				return $this->response('success', 200, 'Autenticado com sucesso!', true);
			}
			else
			{
				return $this->response('error', 403, 'Erro na autenticação!', false);
			}
		}
		else
		{
			return $this->response('error', 511, 'Nao autenticado', false);
		}		
	}
	
	private function base64UrlEncode ($dados)
	{
		return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($dados));
	}
}