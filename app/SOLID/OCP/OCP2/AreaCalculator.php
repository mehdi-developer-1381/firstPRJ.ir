<?php

namespace App\SOLID\OCP\OCP2;



class AreaCalculator
{
    public static function calculateShapeArea(ShapeInterface ...$shapes):int
    {
        $shape= null;
        foreach($shapes as $shape){
            return $shape->area();
        };


    }
}
