<?php

namespace App\DesignPatterns\BuilderPattern\EX01;

abstract class HouseOptions implements HouseRequirements
{
    protected string $houseMaterial;
    protected string $window_name;
    protected string $door_name;
    protected string $innerWall_name;
    protected string $outerWall_name;


    public function __construct()
    {
        $this->houseMaterial = "wood";
    }

    public function window($window_name):self
    {
        $this->window_name= $window_name;
        return $this;
    }

    public function door($door_name):self
    {
        $this->door_name= $door_name;
        return $this;
    }

    public function innerWall($innerWall_name):self
    {
        $this->innerWall_name= $innerWall_name;
        return $this;
    }

    public function outerWall($outerWall_name):self
    {
        $this->outerWall_name= $outerWall_name;
        return $this;
    }


}
