<?php

namespace App\Services;

use App\Services\Gateway\Kpay;
use App\Services\Gateway\WavePay;
use App\Services\GatewayAdapter\KpayAdapter;
use App\Services\GatewayAdapter\WavePayAdapter;

class GateWayService
{
    public function processPayment(string $gateway) {
        $paymentAdapter = $this->resolveAdapter($gateway);

        if (!$paymentAdapter) {
            return "Invalid payment gateway";
        }

        $transactionId = $paymentAdapter->makePayment();
        return $transactionId;
    }
    public function refundPayment(string $gateway, string $transactionId, float $amount) {
        $paymentAdapter = $this->resolveAdapter($gateway);

        if (!$paymentAdapter) {
            return "Invalid payment gateway";
        }

        $refundId = $paymentAdapter->refund($transactionId, $amount);
        return $refundId;
    }

    private function resolveAdapter(string $gateway): WavePayAdapter|KpayAdapter|null
    {
        return match ($gateway) {
            'kpay' => new KpayAdapter(new Kpay()),
            'wave' => new WavePayAdapter(new WavePay()),
            default => null,
        };
    }
}
