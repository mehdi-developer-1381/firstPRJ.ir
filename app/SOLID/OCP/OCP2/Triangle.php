<?php

namespace App\SOLID\OCP\OCP2;

class Triangle implements ShapeInterface
{
    private $base;
    private $height;

    /**
     * @param $base
     * @param $height
     */

    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }


    public function area():int
    {
        return $this->base * $this->height /2;
    }
}
