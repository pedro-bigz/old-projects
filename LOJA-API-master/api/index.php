<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Content-type: application/json; charset=utf-8');

require './core/Config.php';
require './vendor/autoload.php';

use Core\ConfigController as Home;

$Url = new Home();
$Url->load();

