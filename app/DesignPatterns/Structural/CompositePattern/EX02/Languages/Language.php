<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX02\Languages;

interface Language
{
    public function setLanguage(string $language): void;
    public function getLanguage(): string;
}
