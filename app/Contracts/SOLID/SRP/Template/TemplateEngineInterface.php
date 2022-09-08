<?php

namespace App\Contracts\SOLID\SRP\Template;

interface TemplateEngineInterface
{
    public function render(string $template, array $params):string;
}
