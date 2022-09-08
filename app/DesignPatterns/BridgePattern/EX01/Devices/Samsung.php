<?php

namespace App\DesignPatterns\BridgePattern\EX01\Devices;

class Samsung extends SmartPhone
{
    public function sendMessage($body)
    {
        $this->messenger->send($body);
    }
}
