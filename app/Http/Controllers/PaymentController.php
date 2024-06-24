<?php

namespace App\Http\Controllers;


use App\Services\PaymentOptions\KbzPay;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private KbzPay $kbzPay;

    public function __construct(KbzPay $kbzPay)
    {
        $this->kbzPay = $kbzPay;
    }


    public function __invoke(Request $request)
    {
        if ($request->payment_type == 'kpay') {
            $payment = $this->kbzPay;
            return response()->json($payment->getFields(), 200);
        } else {
            return response()->json(['message' => 'wave pay'], 200);
        }
    }
}
