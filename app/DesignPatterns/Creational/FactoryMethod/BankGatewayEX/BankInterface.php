<?php

namespace App\DesignPatterns\Creational\FactoryMethod\BankGatewayEX;

interface BankInterface
{
    public function gateway(string $message):void;

}
