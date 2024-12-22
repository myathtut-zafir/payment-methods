<?php

use App\Http\Controllers\GateWayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SendPaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/payments', PaymentController::class)->name('payment.show');
Route::get('/payments-mail', SendPaymentController::class)->name('payment.mail');


Route::get('/gateway', GateWayController::class);
Route::get('/order', OrderController::class);
