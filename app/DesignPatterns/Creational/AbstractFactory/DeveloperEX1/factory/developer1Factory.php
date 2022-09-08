<?php

namespace App\DesignPatterns\Creational\AbstractFactory\DeveloperEX1\factory;

use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX1\oneSide\developer1;
use App\DesignPatterns\Creational\AbstractFactory\DeveloperEX1\secondSide\phpLang;

class developer1Factory implements developerFactory
{
    public function makeLang()
    {

        return new phpLang();
    }
    public function developerThisPosition() { return new developer1();}
}
