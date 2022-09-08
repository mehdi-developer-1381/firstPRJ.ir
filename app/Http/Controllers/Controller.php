<?php
namespace App\Http\Controllers;


use App\DesignPatterns\Structional\BridgePattern\EX01\Messaging\PDFMessaging;
use App\DesignPatterns\Structional\BridgePattern\EX01\Messenger\Telegram;
use App\DesignPatterns\Structional\CompositePattern\EX01\PlayList;
use App\DesignPatterns\Structional\CompositePattern\EX01\Song;
use App\DesignPatterns\Structional\CompositePattern\EX02\Companies\Dice;
use App\DesignPatterns\Structional\CompositePattern\EX02\Job;
use App\DesignPatterns\Structional\CompositePattern\EX02\Languages\PhpLang;
use App\DesignPatterns\Structional\CompositePattern\EX02\Programmers\Backend;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Backend $backend,PhpLang $phpLang,Dice $dice)
    {


        $job= new Job();
        $job->setProgrammerFullName($backend)->setFullName("MehdiMosalaei");
        $job->setCompany($dice)->setCompanyName("Dice");
        $job->setProgrammingLang($phpLang)->setLanguage("PHP");


        dd($job->getThisPosition());
    }

}





