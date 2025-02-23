<?php

namespace App\Services\Order;

use App\Contracts\Cor\AbstractOrderProcessor;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;


class OrderService
{
    public function processPipline(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = app(Pipeline::class)
            ->send($request)
            ->via('process')
            ->through([
                CheckStock::class,
                CheckUserBalance::class,
                ProcessOrderSuccess::class
            ])
            ->thenReturn();

        if ($data) {
            return response()->json([
                'message' => $data
            ]);
        }

        return response()->json(['message' => 'Order processed successfully.'], 200); // Success response

    }

}
