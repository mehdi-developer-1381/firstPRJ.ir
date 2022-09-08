<?php

namespace App\DesignPatterns\FactoryMethod\BankGatewayEX;

class SinaBankGatewayFactory extends BankGatewayCreator
{

    protected function getBank(): BankInterface
    {
        if(!$this->bank instanceof BankInterface) {
            $this->bank = new SinaBank();
        }
        return $this->bank;
    }

    public function doSomethingToYourBank()
    {
        $bank= $this->getBank();

        $bank->gateway("I Have Gift For You");
    }
}
