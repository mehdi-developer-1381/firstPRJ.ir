<?php

namespace App\SOLID\OCP\Encode;

use App\Contracts\SOLID\OCP\Encode\EncodeInterface;

class JsonEncoder implements EncodeInterface
{

    public function encode(string $text): string
    {
        return $text." "."<h3 style='display: inline'>JSON Encoded</h3>";
    }
}
