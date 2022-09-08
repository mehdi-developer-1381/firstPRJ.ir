<?php

namespace App\SOLID\SRP\Translating;

use App\Contracts\SOLID\SRP\Translating\TranslatorInterface;

class TranslatorClass implements TranslatorInterface
{
    public function translate(string $text): string
    {
        return $text;
    }
}
