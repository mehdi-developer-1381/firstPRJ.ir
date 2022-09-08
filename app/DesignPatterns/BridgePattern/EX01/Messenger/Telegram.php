<?php

namespace App\DesignPatterns\BridgePattern\EX01\Messenger;

class Telegram implements Messenger
{

    public function send(string $body)
    {
        echo $body;
    }
}

