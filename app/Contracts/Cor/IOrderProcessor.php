<?php

namespace App\Contracts\Cor;

use Illuminate\Http\Request;

interface IOrderProcessor
{
    public function setNext(IOrderProcessor $IOrderProcessor): IOrderProcessor;
    public function process(Request $request);
}
