<?php

namespace App\SOLID\OCP\OCP3;

class PaymentService
{
    public function makePaymentMethod(PaymentInterface $payment):string
    {
        return $payment->payment();
    }
    

}
