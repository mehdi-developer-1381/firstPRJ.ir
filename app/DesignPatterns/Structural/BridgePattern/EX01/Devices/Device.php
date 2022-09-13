<?php

namespace App\DesignPatterns\Structural\BridgePattern\EX01\Devices;

use App\DesignPatterns\Structural\BridgePattern\EX01\Messaging\Messaging;
use App\DesignPatterns\Structural\BridgePattern\EX01\Messenger\Messenger;

interface Device
{
    public function setMessenger(Messenger $messenger);
    public function setMessagePattern(Messaging $messaging);
    public function sendMessage($body);
}
