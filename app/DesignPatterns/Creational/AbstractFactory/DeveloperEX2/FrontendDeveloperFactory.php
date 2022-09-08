<?php

namespace App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2;

use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies\CompanyInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies\NetflixCompany;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Languages\Java;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Languages\ProgramingLangInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Programmers\AliJokar;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Programmers\DevelopersInterface;

class FrontendDeveloperFactory implements PositionFactory
{

    public function getLanguage(): ProgramingLangInterface
    {
        return new Java();
    }

    public function getDeveloper(): DevelopersInterface
    {
        return new AliJokar();
    }

    public function getCompany(): CompanyInterface
    {
        return new NetflixCompany();
    }
}
