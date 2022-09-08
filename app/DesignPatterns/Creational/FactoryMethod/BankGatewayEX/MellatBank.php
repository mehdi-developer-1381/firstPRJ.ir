<?php

namespace App\DesignPatterns\Creational\FactoryMethod\BankGatewayEX;

class MellatBank implements BankInterface
{

    public function gateway(string $message): void
    {
        echo "Mellat Bank::".$message;
    }
}
