<?php

    require './core/Config.php';
    require './vendor/autoload.php';

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
    header('Content-type: application/json; charset=utf-8');

    use Core\ConfigController as Home;

    $Url = new Home();
    $user = $Url->checkLogged();

    if ($user['data'])
    {
        $Url->load();
    }
    else
    {
        if ($user['code'] == 511 && !strcasecmp($Url->getMethod(), 'POST'))
        {
            $Url->setUrlController(HOME); 
            $Url->load();
        }
        else
        {
            $Url->getResponse();
        }
    }

