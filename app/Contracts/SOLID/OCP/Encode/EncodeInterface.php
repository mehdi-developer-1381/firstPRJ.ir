<?php

namespace App\Contracts\SOLID\OCP\Encode;

interface EncodeInterface
{
    public function encode(string $text):string;
}
