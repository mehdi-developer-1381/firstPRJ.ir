<?php

namespace App\SOLID\DIP\Example;


use Intervention\Image\Facades\Image;
use App\SOLID\DIP\Example\ImageInterface;

class MyImage implements ImageInterface
{
    public function width($imagePath):void
    {
        $image= Image::make($imagePath);
        echo $image->width()."px----->Width";
        echo "</br>";
        echo $image->height()."px----->Height";

    }
}
