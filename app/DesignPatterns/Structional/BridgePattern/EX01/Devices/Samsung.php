<?php

namespace App\DesignPatterns\Structional\BridgePattern\EX01\Devices;

class Samsung extends SmartPhone
{
    public function sendMessage($body)
    {
        $this->messaging->getMessage();
        $this->messenger->send($body);
    }
}
