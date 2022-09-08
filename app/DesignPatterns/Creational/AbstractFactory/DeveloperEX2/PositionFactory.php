<?php

namespace App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2;

use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Companies\CompanyInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Languages\ProgramingLangInterface;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX2\Programmers\DevelopersInterface;

interface PositionFactory
{
    public function getLanguage():ProgramingLangInterface;

    public function getDeveloper():DevelopersInterface;

    public function getCompany():CompanyInterface;
}
