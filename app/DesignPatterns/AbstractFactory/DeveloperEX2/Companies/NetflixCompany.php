<?php

namespace App\DesignPatterns\AbstractFactory\DeveloperEX2\Companies;

class NetflixCompany implements CompanyInterface
{

    public function doSomething(): string
    {
        return "Netflix Programmer";
    }
}
