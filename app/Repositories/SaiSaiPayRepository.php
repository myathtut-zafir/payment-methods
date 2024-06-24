<?php

namespace App\Repositories;

use App\Contracts\ISaiSaiPayRepo;

class SaiSaiPayRepository implements ISaiSaiPayRepo
{
    public function getFields(): array
    {
        return [
            (object)[
                'name' => 'bank_account_name',
                'type' => 'text',
                'label' => 'Bank Account Name',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_account_number',
                'type' => 'text',
                'label' => 'Account Number or IBAN',
                'required' => true,
                'style' => 'col-xl-6',
            ],
            (object)[
                'name' => 'bank_swift_code',
                'type' => 'text',
                'label' => 'ABA or SWIFT Code',
                'required' => true,
                'style' => 'col-xl-6',
            ],
        ];

    }

    public function getValues(int $userId)
    {

    }

    public function store(int $userId, array $data)
    {
        // Store the data
    }

    public function delete(int $userId)
    {
        // Delete the data
    }

    public function makePrimary(int $userId)
    {
        // Make this the primary payment option
    }
}
