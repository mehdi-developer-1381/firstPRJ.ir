<?php

namespace App\DesignPatterns\Creational\FactoryMethod\BankGatewayEX;

abstract class BankGatewayCreator
{
    protected $bank;

    abstract protected function getBank():BankInterface;
}
