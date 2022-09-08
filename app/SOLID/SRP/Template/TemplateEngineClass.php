<?php

namespace App\SOLID\SRP\Template;

use App\Contracts\SOLID\SRP\Template\TemplateEngineInterface;

class TemplateEngineClass implements TemplateEngineInterface
{
    public function render(string $template, array $params): string
    {
        return $template;
    }
}
