<?php

namespace App\DesignPatterns\FactoryMethod\BankGatewayEX;

abstract class BankGatewayCreator
{
    protected $bank;

    abstract protected function getBank():BankInterface;
}
