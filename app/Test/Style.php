<?php

namespace App\Test;

class Style
{
    public static function setStyle(array $styles)
    {
        $makeStyle= null;
        foreach($styles as $style)
        {
            $makeStyle .= $style."; ";
        }
        return $makeStyle;
    }
}
