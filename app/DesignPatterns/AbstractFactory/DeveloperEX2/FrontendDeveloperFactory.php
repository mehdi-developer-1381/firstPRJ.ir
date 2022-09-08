<?php

namespace App\DesignPatterns\AbstractFactory\DeveloperEX2;

use App\DesignPatterns\AbstractFactory\DeveloperEX2\Companies\CompanyInterface;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\Companies\NetflixCompany;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\Languages\Java;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\Languages\ProgramingLangInterface;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\Programmers\AliJokar;
use App\DesignPatterns\AbstractFactory\DeveloperEX2\Programmers\DevelopersInterface;

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
