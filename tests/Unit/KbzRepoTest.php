<?php

namespace Tests\Unit;

use App\Repositories\KbzPayRepository;

beforeEach(function () {
    $this->kbzPayRepository = new KbzPayRepository();
});
test('kbz repo get fields', function () {
    $kbz = new KbzPayRepository();
    expect($kbz->getFields())->toBeArray();
});

test('getFields returns correct structure', function () {
    // Act
    $fields = $this->kbzPayRepository->getFields();

    // Assert
    expect($fields)
        ->toBeArray()
        ->not->toBeEmpty();

    // Test first field (bank_account_name)
    $firstField = $fields[0];
    expect($firstField)
        ->name->toBe('bank_account_name')
        ->type->toBe('text')
        ->label->toBe('Bank Account Name')
        ->required->toBeTrue()
        ->style->toBe('col-xl-12');
});
