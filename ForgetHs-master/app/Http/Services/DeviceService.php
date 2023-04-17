<?php
namespace App\Http\Services;

use Mobile_Detect;

class DeviceService implements DeviceServiceInterface
{
    private $detect;

    public function __construct ()
    {
        $this->detect = new Mobile_Detect();
    }

    public function isMobile ()
    {
        return $this->detect->isMobile();
    }
}

