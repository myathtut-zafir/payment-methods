<?php

namespace App\Repositories;

use App\Contracts\IWavePayRepo;

class WavePayRepository implements IWavePayRepo
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
