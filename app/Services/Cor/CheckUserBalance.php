<?php

namespace App\Services\Cor;

use App\Contracts\Cor\AbstractOrderProcessor;
use Illuminate\Http\Request;


class CheckUserBalance extends AbstractOrderProcessor
{
    private int $balance = 10000;

    public function process(Request $request)
    {
        if ($this->balance > 0) {
            return parent::process($request);
        }

        return"Balance is not enough";
    }

}
