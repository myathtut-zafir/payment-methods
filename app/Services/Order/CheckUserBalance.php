<?php

namespace App\Services\Order;

use App\Contracts\Cor\AbstractOrderProcessor;
use Closure;
use Illuminate\Http\Request;


class CheckUserBalance
{
    private int $balance = 10000;

    public function process(Request $request, Closure $next)
    {
        if ($this->balance > 0) {
            return $next($request);
        }

        return "Balance is not enough";
    }

}
