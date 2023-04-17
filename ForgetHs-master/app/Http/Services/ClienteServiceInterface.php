<?php

namespace App\Http\Services;

interface ClienteServiceInterface
{
    function clienteAutoRegister ();
    function getUserByClienteId ($clienteId);
}

