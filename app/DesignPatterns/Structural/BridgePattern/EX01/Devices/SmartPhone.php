<?php

namespace App\DesignPatterns\Structural\BridgePattern\EX01\Devices;

use App\DesignPatterns\Structural\BridgePattern\EX01\Messaging\Messaging;
use App\DesignPatterns\Structural\BridgePattern\EX01\Messenger\Messenger;

abstract class SmartPhone implements Device
{
    protected Messenger $messenger;
    protected Messaging $messaging;

    public function setMessenger(Messenger $messenger){
        $this->messenger= $messenger;
    }

    public function setMessagePattern(Messaging $messaging)
    {
        $this->messaging= $messaging;
    }
}
