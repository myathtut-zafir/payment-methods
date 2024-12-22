<?php

namespace App\Contracts\Cor;

use Illuminate\Http\Request;

abstract class AbstractOrderProcessor implements IOrderProcessor
{
    private IOrderProcessor $next;

    public function setNext(IOrderProcessor $IOrderProcessor): IOrderProcessor
    {
        $this->next = $IOrderProcessor;
        return $IOrderProcessor;
    }

    public function process(Request $request)
    {
        return $this->next->process($request);
    }

}
