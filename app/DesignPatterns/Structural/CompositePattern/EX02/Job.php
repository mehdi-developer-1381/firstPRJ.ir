<?php

namespace App\DesignPatterns\Structural\CompositePattern\EX02;

use App\DesignPatterns\Structural\CompositePattern\EX02\Companies\Company;
use App\DesignPatterns\Structural\CompositePattern\EX02\Languages\Language;
use App\DesignPatterns\Structural\CompositePattern\EX02\Programmers\Programmer;
use JetBrains\PhpStorm\ArrayShape;

class Job
{
    private Programmer $programmerFullName;
    private Language $programmingLang;
    private Company $company;


    public function setProgrammerFullName(Programmer $programmers): Programmer
    {
        return $this->programmerFullName= $programmers;
    }


    public function setProgrammingLang(Language $programmingLang): Language
    {
       return $this->programmingLang = $programmingLang;
    }

    public function setCompany(Company $company): Company
    {
       return $this->company= $company;
    }


    #[ArrayShape(["FullName" => "", "ProgrammingLang" => "string", "CompanyName" => "string"])]
    public function getThisPosition(): array
    {
        return [
            "FullName"  =>  $this->programmerFullName->getFullname(),
            "ProgrammingLang"  =>  $this->programmingLang->getLanguage(),
            "CompanyName"  =>  $this->company->getCompanyName()
        ];
    }
}
