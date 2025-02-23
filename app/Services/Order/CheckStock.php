<?php

namespace App\Services\Order;

use Illuminate\Http\Request;
use Closure;


class CheckStock
{
    private int $stock = 100;

    public function process(Request $request,Closure $next)
    {
        if ($this->stock > 0) {
            return $next($request);
        }
        return "Stock is not available";
    }

}
