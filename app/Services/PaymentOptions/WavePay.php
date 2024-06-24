<?php

namespace App\Services\PaymentOptions;

use App\Contracts\PaymentOption;
use App\Contracts\IWavePayRepo;
use App\Repositories\WavePayRepository;

class WavePay implements PaymentOption
{
    private IWavePayRepo $wavePayRepo;

    public function __construct(WavePayRepository $wavePayRepo)
    {
        $this->wavePayRepo = $wavePayRepo;
    }

    public function getFields()
    {
        return $this->wavePayRepo->getFields();
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
