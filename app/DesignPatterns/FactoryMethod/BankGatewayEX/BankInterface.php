<?php

namespace App\DesignPatterns\FactoryMethod\BankGatewayEX;

interface BankInterface
{
    public function gateway(string $message):void;

}
