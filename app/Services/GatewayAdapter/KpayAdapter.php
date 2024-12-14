<?php

namespace App\Services\GatewayAdapter;

use App\Contracts\GateWay\PaymentGateWay;
use App\Services\Gateway\Kpay;

class KpayAdapter implements PaymentGateWay
{

    private Kpay $kpay;

    public function __construct(Kpay $kpay)
    {
        $this->kpay = $kpay;
    }

    public function makePayment(): string
    {
        return $this->kpay->charge();
    }

    public function refund(string $transactionId, float $amount): string
    {
        try {
            return $this->kpay->refund($transactionId, $amount);
        } catch (\Exception $e) {
            return "Kpay Refund Error: " . $e->getMessage();
        }
    }
}
