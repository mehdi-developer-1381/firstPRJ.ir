<?php

namespace App\DesignPatterns\AdapterPattern\EX02;

class Order
{
    private KavehNegarAdapter $kavehNegarAdapter;

    public function __construct(KavehNegarAdapter $kavehNegarAdapter)
    {
        $this->kavehNegarAdapter = $kavehNegarAdapter;
    }

    public function create(): void
    {
        echo "Order Created"."</br>";
        $this->kavehNegarAdapter->sendSMSNotification();
    }
}
