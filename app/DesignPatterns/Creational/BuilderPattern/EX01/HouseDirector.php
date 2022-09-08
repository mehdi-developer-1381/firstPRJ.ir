<?php

namespace App\DesignPatterns\Creational\BuilderPattern\EX01;

class HouseDirector
{
    private HouseRequirements $houseOptions;

    public function __construct(HouseRequirements $houseRequirements)
    {
        $this->houseOptions = $houseRequirements;
    }

    public function makeHome():void
    {
        $this->houseOptions
            ->window("pvc")
            ->door("wooden")
            ->innerWall("1")
            ->outerWall("2");
    }

    public function getBuildHouse(): array
    {
        return $this->houseOptions->houseBuilder();
    }
}
