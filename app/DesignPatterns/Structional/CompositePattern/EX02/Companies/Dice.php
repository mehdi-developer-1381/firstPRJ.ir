<?php

namespace App\DesignPatterns\Structional\CompositePattern\EX02\Companies;

class Dice implements Company
{
    private string $companyName;

    public function setCompanyName(string $companyName): void
    {
        $this->companyName = $companyName;
    }
    public function getCompanyName(): string
    {
        return $this->companyName;
    }
}
