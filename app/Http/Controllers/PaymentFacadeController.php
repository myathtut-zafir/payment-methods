<?php

namespace App\Http\Controllers;

use App\Facades\PaymentFacade;

class PaymentFacadeController extends Controller
{
    public function __invoke()
    {
        return PaymentFacade::kpay();
    }
}
