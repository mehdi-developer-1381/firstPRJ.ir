<?php

namespace App\DesignPatterns\BridgePattern\EX01\Devices;

use App\DesignPatterns\BridgePattern\EX01\Messenger\Messenger;

abstract class SmartPhone implements Device
{
    protected Messenger $messenger;
    public function setMessenger(Messenger $messenger){
        $this->messenger = $messenger;
    }
}
