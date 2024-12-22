<?php

namespace App\Services\Cor;

use App\Contracts\Cor\AbstractOrderProcessor;
use Illuminate\Http\Request;


class CheckStock extends AbstractOrderProcessor
{
    private int $stock = 100;

    public function process(Request $request)
    {
        if ($this->stock > 0) {
            return parent::process($request);
        }
        return "Stock is not available";
    }

}
