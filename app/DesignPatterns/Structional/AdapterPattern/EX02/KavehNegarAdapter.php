<?php

namespace App\DesignPatterns\Structional\AdapterPattern\EX02;

class KavehNegarAdapter
{
    private KavehNegarApi $kavehNegar;

    public function __construct(KavehNegarApi $kavehNegar)
    {
        $this->kavehNegar = $kavehNegar;
    }

    public function sendSMSNotification():void
    {
        $this->kavehNegar->sendSMS();
    }
}
