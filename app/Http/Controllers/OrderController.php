<?php

namespace App\Http\Controllers;

use App\Services\Cor\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function __invoke(Request $request)
    {
        $orderService = new OrderService();
        return $orderService->process($request);
        //this is pipline
//        $orderService = new \App\Services\Order\OrderService();
//        return $orderService->processPipline($request);

    }
}
