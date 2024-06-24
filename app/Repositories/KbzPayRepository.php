<?php

namespace App\Repositories;


use App\Contracts\IKpayRepo;

class KbzPayRepository implements IKpayRepo
{
    public function getFields()
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
            (object)[
                'name' => 'account_address',
                'type' => 'text',
                'label' => 'Address 1',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'account_address2',
                'type' => 'text',
                'label' => 'Address 2',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'account_city',
                'type' => 'text',
                'label' => 'City',
                'required' => true,
                'style' => 'col-xl-6',
            ],
            (object)[
                'name' => 'account_zip',
                'type' => 'text',
                'label' => 'Zip',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'account_country',
                'type' => 'select',
                'label' => 'Country',
                'required' => true,
                'style' => 'col-xl-12',
                'options' => ["testing", "testing"]
            ],
            (object)[
                'name' => 'account_state',
                'type' => 'text',
                'label' => 'State',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_name',
                'type' => 'text',
                'label' => 'Bank Name',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_address',
                'type' => 'text',
                'label' => 'Address 1',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_address2',
                'type' => 'text',
                'label' => 'Address 2',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_city',
                'type' => 'text',
                'label' => 'City',
                'required' => true,
                'style' => 'col-xl-6',
            ],
            (object)[
                'name' => 'bank_zip',
                'type' => 'text',
                'label' => 'Zip',
                'required' => true,
                'style' => 'col-xl-12',
            ],
            (object)[
                'name' => 'bank_country',
                'type' => 'select',
                'label' => 'Country',
                'required' => true,
                'style' => 'col-xl-12',
                'options' => ["testing", "testing"]
            ],
            (object)[
                'name' => 'bank_state',
                'type' => 'text',
                'label' => 'State',
                'required' => true,
                'style' => 'col-xl-12',
            ],
        ];

    }

    public function getValues(int $userId)
    {

    }

    public function store(int $userId, array $data)
    {
        try {
            $fields = $this->getFields();
            $payoneerDetails = [];
            foreach ($fields as $field) {
                if (isset($data[$field->name])) {
                    $payoneerDetails[$field->name] = $data[$field->name];
                } else {
                    throw new \Exception("Missing field: {$field->name}");
                }
            }
            return $this->payoneerRepository->store($userId, $payoneerDetails);
        } catch (\Throwable $th) {
            throw $th;
        }
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
