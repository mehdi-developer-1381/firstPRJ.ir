<?php

namespace App\DesignPatterns\Structional\CompositePattern\EX02\Languages;

interface Language
{
    public function setLanguage(string $language): void;
    public function getLanguage(): string;
}
