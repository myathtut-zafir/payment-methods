<?php

namespace App\Services\GatewayAdapter;

use App\Contracts\GateWay\PaymentGateWay;
use App\Services\Gateway\WavePay;

class WavePayAdapter implements PaymentGateWay
{

    private WavePay $wavePay;

    public function __construct(WavePay $wavePay)
    {
        $this->wavePay = $wavePay;
    }

    public function makePayment()
    {
        return $this->wavePay->wave();
    }


    public function refund(string $transactionId, float $amount): string
    {
        try {
            return $this->wavePay->refund($transactionId, $amount);
        } catch (\Exception $e) {
            return "Wavepay Refund Error: " . $e->getMessage();
        }
    }
}
