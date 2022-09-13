<?php

namespace App\DesignPatterns\Structural\BridgePattern\EX01\Messaging;

class PDFMessaging implements Messaging
{

    public function getMessage()
    {
        echo "PDF Message Pattern". PHP_EOL;
    }
}
