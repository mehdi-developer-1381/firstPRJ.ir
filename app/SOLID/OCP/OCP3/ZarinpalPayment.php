<?php

namespace App\SOLID\OCP\OCP3;

class ZarinpalPayment implements PaymentInterface
{

    public function payment(): string
    {
        return "zarinpal payment method";
    }
}
