<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX02\Programmers;

class Frontend implements Programmer
{
    private string $fullName;
    public function setFullName(string $fullName): void
    {
        $this->fullName= $fullName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }
}
