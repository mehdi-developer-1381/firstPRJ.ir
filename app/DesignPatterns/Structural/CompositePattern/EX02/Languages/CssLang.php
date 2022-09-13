<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX02\Languages;

class CssLang implements Language
{
    private string $language;

    public function setLanguage(string $language): void
    {
        $this->language= $language;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}
