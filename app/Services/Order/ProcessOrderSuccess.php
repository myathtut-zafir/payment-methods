<?php

namespace App\Services\Order;

use Closure;
use Illuminate\Http\Request;


class ProcessOrderSuccess
{
    public function process(Request $request, Closure $next)
    {
        return null;
    }

}
