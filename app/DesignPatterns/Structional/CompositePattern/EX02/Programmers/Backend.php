<?php

namespace App\DesignPatterns\Structional\CompositePattern\EX02\Programmers;

class Backend implements Programmer
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
