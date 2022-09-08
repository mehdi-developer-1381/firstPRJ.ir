<?php

namespace App\DesignPatterns\Structional\BridgePattern\EX01\Messenger;

class Telegram implements Messenger
{

    public function send(string $body)
    {
        echo $body. PHP_EOL;
    }
}

