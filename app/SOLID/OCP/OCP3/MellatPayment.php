<?php

namespace App\SOLID\OCP\OCP3;

class MellatPayment implements PaymentInterface
{
    public function payment(): string
    {
        return "mellat payment method";
    }
}
