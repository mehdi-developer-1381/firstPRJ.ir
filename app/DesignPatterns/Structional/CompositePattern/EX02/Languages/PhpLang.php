<?php

namespace App\DesignPatterns\Structional\CompositePattern\EX02\Languages;

class PhpLang implements Language
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
