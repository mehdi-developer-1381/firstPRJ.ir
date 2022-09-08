<?php

namespace App\SOLID\DIP\Example;

interface ImageInterface
{
    public function width(string $imagePath):void;
}
