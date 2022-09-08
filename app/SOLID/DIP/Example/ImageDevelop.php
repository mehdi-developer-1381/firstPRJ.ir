<?php

namespace App\SOLID\DIP\Example;

class ImageDevelop
{
    private ImageDevelopFactory $imageDevelopFactory;

    /**
     * @param ImageDevelopFactory $imageDevelopFactory
     */

    public function __construct(ImageDevelopFactory $imageDevelopFactory)
    {
        $this->imageDevelopFactory = $imageDevelopFactory;
    }


    public function getImage():string
    {
        return $this->imageDevelopFactory->getImage();
    }
}
