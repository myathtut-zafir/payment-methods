<?php

namespace App\Http\Controllers;


use App\Contracts\PaymentOption;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private PaymentOption $paymentOption;

    public function __construct(PaymentOption $paymentOption)
    {
        $this->paymentOption = $paymentOption;
    }


    public function __invoke(Request $request)
    {
        $payment = $this->paymentOption;
        return response()->json($payment->getFields());
    }
}
