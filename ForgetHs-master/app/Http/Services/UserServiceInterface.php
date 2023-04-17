<?php

namespace App\Http\Services;

interface UserServiceInterface
{
    function isAdministrator ();
    function isModerador ();
    function isCliente ();
}

