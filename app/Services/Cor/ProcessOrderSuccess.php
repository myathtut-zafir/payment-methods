<?php

namespace App\Services\Cor;

use App\Contracts\Cor\AbstractOrderProcessor;
use Illuminate\Http\Request;


class ProcessOrderSuccess extends AbstractOrderProcessor
{
    public function process(Request $request): null
    {
        return null;
    }

}
