<?php

namespace App\DesignPatterns\BridgePattern\EX01\Devices;

class Xiaomi extends SmartPhone
{
    public function sendMessage($body)
    {
        $this->messenger->send($body);
    }
}
