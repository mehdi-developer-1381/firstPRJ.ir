<?php

namespace App\DesignPatterns\Structural\BridgePattern\EX01\Devices;

class Samsung extends SmartPhone
{
    public function sendMessage($body)
    {
        $this->messaging->getMessage();
        $this->messenger->send($body);
    }
}
