<?php

namespace App\Http\Controllers;


use App\Contracts\PaymentOption;
use App\Services\GateWayService;
use Illuminate\Http\Request;

class GateWayController extends Controller
{

    public function __invoke(Request $request)
    {
        $gatewayService = app()->make(GateWayService::class)->processPayment("kpay");
        return  $gatewayService;
    }
}
