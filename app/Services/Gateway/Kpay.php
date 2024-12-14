<?php

namespace App\Services\Gateway;

class Kpay
{

    public function charge()
    {
        return 'kpay_' . uniqid();
    }

    public function refund(string $transactionId, float $amount): string
    {

        $refundId = 'refund_kpay_' . uniqid();
        return $refundId;
    }
}
