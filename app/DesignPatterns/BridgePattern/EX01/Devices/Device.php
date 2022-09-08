<?php

namespace App\DesignPatterns\BridgePattern\EX01\Devices;

use App\DesignPatterns\BridgePattern\EX01\Messenger\Messenger;

interface Device
{
    public function setMessenger(Messenger $messenger);
    public function sendMessage($body);
}
