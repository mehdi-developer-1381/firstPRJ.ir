<?php

namespace App\SOLID\OCP\OCP3;

class PaypalPayment implements PaymentInterface
{
    public function payment():string
    {
        return "Paypal Payment Method";
    }
}
