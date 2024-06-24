<?php

namespace App\Http\Controllers;


use App\Services\PaymentOptions\KbzPay;
use App\Services\PaymentOptions\WavePay;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private KbzPay $kbzPay;
    private WavePay $wavePay;

    public function __construct(KbzPay $kbzPay,WavePay $wavePay)
    {
        $this->kbzPay = $kbzPay;
        $this->wavePay = $wavePay;
    }


    public function __invoke(Request $request)
    {
        if ($request->payment_type == 'kpay') {
            $payment = $this->kbzPay;
            return response()->json($payment->getFields());
        } else {
            $payment = $this->wavePay;
            return response()->json($payment->getFields());
        }
    }
}
