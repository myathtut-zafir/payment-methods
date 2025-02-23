<?php

namespace Tests\Unit;

use App\Repositories\KbzPayRepository;

beforeEach(function () {
    $this->kbzPayRepository = new KbzPayRepository();
});
test('kbz repo get fields', function () {

    expect($this->kbzPayRepository->getFields())->toBeArray();
});
