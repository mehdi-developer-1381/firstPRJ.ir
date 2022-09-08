<?php

namespace App\DesignPatterns\Creational\PrototypePattern;

class ClassTst
{
    public $name;
    public function getName()
    {
        return $this->name;
    }


    public function __clone(): void
    {

    }
}
