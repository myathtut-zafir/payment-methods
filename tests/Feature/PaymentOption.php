<?php

namespace Tests\Feature;

use function Pest\Laravel\get;

it('Kpay payment type', function () {
    get(route('payment.show', ['payment_type' => "kpay"]))->assertOk();

});
it('Wave payment type', function () {
    get(route('payment.show', ['payment_type' => "wavepay"]))->assertOk();

});

it('exception payment', function () {
    get(route('payment.show', ['payment_type' => "wavepayddd"]))->assertStatus(500);
});

