<?php

namespace App\Services;

use App\Contracts\PaymentOption;

class PaymentService
{
    private PaymentOption $paymentOption;

    public function kpay()
    {
        return "Kpay payment service";
    }

    public function wave()
    {
        return "Kpay payment service";
    }

    public function setPaymentService(PaymentOption $paymentOption)
    {
        $this->paymentOption = $paymentOption;
    }

    public function getPaymentService()
    {
        return $this->paymentOption->getFields();
    }
}
