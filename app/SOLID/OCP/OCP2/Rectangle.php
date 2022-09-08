<?php

namespace App\SOLID\OCP\OCP2;

class Rectangle implements ShapeInterface
{
    private $width;
    private $height;

    /**
     * @param $width
     * @param $height
     */

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area():int
    {
        return $this->width * $this->height;
    }

}
