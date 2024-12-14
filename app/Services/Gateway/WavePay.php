<?php

namespace App\Services\Gateway;

class WavePay
{

    public function wave()
    {
        return 'wave_' . uniqid();
    }


    public function refund(string $transactionId, float $amount): string
    {

        $refundId = 'refund_wave_' . uniqid();
        return $refundId;
    }
}
