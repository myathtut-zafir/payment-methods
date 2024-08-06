<?php

namespace App\Http\Controllers;

use App\Mail\PaymentEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendPaymentController extends Controller
{

    public function __invoke(Request $request)
    {
        Mail::to('testreceiver@gmail.com')->send(new PaymentEmail());
        return response()->json(['message' => 'Payment email sent']);
    }
}
