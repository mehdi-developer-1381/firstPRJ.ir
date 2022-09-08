<?php

namespace App\DesignPatterns\Structional\BridgePattern\EX01\Messaging;

class PDFMessaging implements Messaging
{

    public function getMessage()
    {
        echo "PDF Message Pattern". PHP_EOL;
    }
}
