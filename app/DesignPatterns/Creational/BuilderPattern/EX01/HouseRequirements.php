<?php

namespace App\DesignPatterns\Creational\BuilderPattern\EX01;

interface HouseRequirements
{
    public function window($window_name): self;

    public function door($door_name): self;

    public function innerWall($innerWall_name): self;

    public function outerWall($outerWall_name): self;

    public function houseBuilder() :array;
}
