<?php

namespace App\DesignPatterns\Creational\FactoryMethod\BankGatewayEX;

class SinaBank implements BankInterface
{

    public function gateway(string $message): void
    {
        echo "Sina Bank::".$message;
    }
}
