<?php

namespace App\DesignPatterns\Structional\AdapterPattern\EX02;

class User
{
    private KavehNegarAdapter $kavehNegarAdapter;

    public function __construct(KavehNegarAdapter $kavehNegarAdapter)
    {
        $this->kavehNegarAdapter = $kavehNegarAdapter;
    }

    public function create():void
    {
        echo "User Created"."</br>";
        $this->kavehNegarAdapter->sendSMSNotification();
    }
}
