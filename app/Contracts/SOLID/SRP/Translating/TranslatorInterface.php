<?php

namespace App\Contracts\SOLID\SRP\Translating;


interface TranslatorInterface
{
    public function translate(String $text):string;
}
