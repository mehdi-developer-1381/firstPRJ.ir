<?php

namespace App\DesignPatterns\Structional\CompositePattern\EX02\Companies;

interface Company
{
    public function setCompanyName(string $companyName): void;
    public function getCompanyName(): string;
}
