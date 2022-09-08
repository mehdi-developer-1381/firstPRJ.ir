<?php

namespace App\SOLID\DIP\Example;

class ImageDevelopFactory
{
    public function getImage():string
    {
        return public_path("images/admin/brand/asdfasdf.jpg");
    }
}
