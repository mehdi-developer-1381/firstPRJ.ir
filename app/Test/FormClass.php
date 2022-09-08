<?php

namespace App\Test;

class FormClass
{
    public static function createForm()
    {
        echo "<form>
                ".TextArea::createTextArea(60,20)."
              </form>";
    }
}
