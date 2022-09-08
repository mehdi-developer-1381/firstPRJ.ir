<?php
namespace App\Http\Controllers;


use App\DesignPatterns\BridgePattern\EX01\Devices\Samsung;
use App\DesignPatterns\BridgePattern\EX01\Messenger\Telegram;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(Telegram $telegram)
    {
        $honor= new Samsung();
        $honor->setMessenger($telegram);
        $honor->sendMessage("Hello Mehdi Mosalaei");



    }

}





