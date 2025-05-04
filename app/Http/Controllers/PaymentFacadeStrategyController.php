<?php

namespace App\Http\Controllers;

use App\Facades\PaymentFacade;
use App\Repositories\KbzPayRepository;
use App\Services\PaymentOptions\KbzPay;

class PaymentFacadeStrategyController extends Controller
{
    public function __invoke()
    {
         PaymentFacade::setPaymentService(new KbzPay(new KbzPayRepository()));
         return PaymentFacade::getPaymentService();

    }
}
