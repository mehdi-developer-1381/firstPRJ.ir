<?php

namespace App\DesignPatterns\AdapterPattern\EX02;

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
