<?php

namespace App\DesignPatterns\Structional\BridgePattern\EX01\Devices;

use App\DesignPatterns\Structional\BridgePattern\EX01\Messaging\Messaging;
use App\DesignPatterns\Structional\BridgePattern\EX01\Messenger\Messenger;

interface Device
{
    public function setMessenger(Messenger $messenger);
    public function setMessagePattern(Messaging $messaging);
    public function sendMessage($body);
}
