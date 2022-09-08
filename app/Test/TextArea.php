<?php

namespace App\Test;

class TextArea
{
    public static function createTextArea(int $cols, int $rows)
    {
        return "<textarea cols='$cols' rows='$rows'></textarea>";
    }
}
