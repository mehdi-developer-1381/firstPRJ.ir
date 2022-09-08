<?php

namespace App\SOLID\OCP\OCP2;

class Circle implements ShapeInterface
{
    private $radius;

    /**
     * @param $radius
     */

    public function __construct($radius)
    {
        $this->radius = $radius;
        return $this->radius;
    }


    public function area():int
    {
        return $this->radius * 2;
    }

}
