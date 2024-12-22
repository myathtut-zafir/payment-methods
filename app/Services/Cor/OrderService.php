<?php

namespace App\Services\Cor;

use App\Contracts\Cor\AbstractOrderProcessor;
use Illuminate\Http\Request;


class OrderService
{
    public function process(Request $request)
    {
        $checkStock = new CheckStock();
        $checkUserBalance = new CheckUserBalance();
        $processOrder = new ProcessOrderSuccess();

        $checkStock->setNext($checkUserBalance)->setNext($processOrder);
        $error = $checkStock->process($request);
        if ($error) {
            return response()->json([
                'message' => $error
            ]);
        }

        return response()->json(['message' => 'Order processed successfully.'], 200); // Success response

    }

}
