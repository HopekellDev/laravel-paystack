<?php

namespace HopekellDev\Paystack\Services;

use HopekellDev\Paystack\Helpers\HasHttpClient;

class Transactions
{
    use HasHttpClient;

    public function initialize(array $payload): array
    {
        return $this->post('/transaction/initialize', $payload);
    }

    public function verify(string $reference): array
    {
        return $this->get("/transaction/verify/{$reference}");
    }

    public function list(array $query = []): array
    {
        return $this->get('/transaction', $query);
    }

    public function fetch(int|string $transactionId): array
    {
        return $this->get("/transaction/{$transactionId}");
    }

    public function chargeAuthorization(array $payload): array
    {
        return $this->post('/transaction/charge_authorization', $payload);
    }

    public function totals(array $query = []): array
    {
        return $this->get('/transaction/totals', $query);
    }

    public function export(array $query = []): array
    {
        return $this->get('/transaction/export', $query);
    }
}