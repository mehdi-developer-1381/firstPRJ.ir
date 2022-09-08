<?php

namespace App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2;

use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies\CompanyInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies\DiceCompany;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Languages\Php;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Languages\ProgramingLangInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Programmers\DevelopersInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Programmers\MehdiMosalaei;


class BackendDeveloperFactory implements PositionFactory
{
    public function getLanguage(): ProgramingLangInterface
    {
        return new Php();
    }

    public function getDeveloper(): DevelopersInterface
    {
        return new MehdiMosalaei();
    }

    public function getCompany(): CompanyInterface
    {
        return new DiceCompany();
    }

}
