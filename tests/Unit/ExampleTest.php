<?php

namespace Tests\Unit;

use App\Repositories\KbzPayRepository;

test('kbz repo get fields', function () {
    $kbz=new KbzPayRepository();
    expect($kbz->getFields())->toBeArray();
});
