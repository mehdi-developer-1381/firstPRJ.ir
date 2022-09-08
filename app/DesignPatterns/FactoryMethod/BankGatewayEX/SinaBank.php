<?php

namespace App\DesignPatterns\FactoryMethod\BankGatewayEX;

class SinaBank implements BankInterface
{

    public function gateway(string $message): void
    {
        echo "Sina Bank::".$message;
    }
}
