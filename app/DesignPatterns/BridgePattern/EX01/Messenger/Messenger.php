<?php

namespace App\DesignPatterns\BridgePattern\EX01\Messenger;

interface Messenger
{
    public function send(string $body);
}
