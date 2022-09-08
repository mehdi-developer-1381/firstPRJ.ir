<?php

namespace App\DesignPatterns\BuilderPattern\EX01;

use JetBrains\PhpStorm\ArrayShape;

class WoodenHouse extends HouseOptions
{
    public function houseBuilder(): array
    {

        return [
            "window"       => $this->window_name,
            "door"         => $this->door_name,
            "innerWall"    => $this->innerWall_name,
            "outerWall"    => $this->outerWall_name,
            "houseMaterial" => $this->houseMaterial
        ];
    }
}



