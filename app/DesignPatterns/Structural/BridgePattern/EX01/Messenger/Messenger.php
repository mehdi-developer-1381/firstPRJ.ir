<?php

namespace App\DesignPatterns\Structural\BridgePattern\EX01\Messenger;

interface Messenger
{
    public function send(string $body);
}
