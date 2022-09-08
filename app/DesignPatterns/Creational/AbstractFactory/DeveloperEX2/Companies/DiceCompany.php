<?php

namespace App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies;

class DiceCompany implements CompanyInterface
{

    public function doSomething(): string
    {
        return "Dice Programmer";
    }
}
