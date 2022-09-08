<?php

namespace App\SOLID\DIP\Example;

use Intervention\Image\Image;

class SymfonyImage implements ImageInterface
{
    private Image $image;

    /**
     * @param MyImage $image
     */

    public function __construct(Image $image)
    {
        $this->image = $image;
    }


    public function width()
    {
        $this->image->width();
    }
}
