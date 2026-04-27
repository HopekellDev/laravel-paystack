<?php

namespace HopekellDev\Paystack\Services;

use HopekellDev\Paystack\Helpers\HasHttpClient;

class Plans
{
    use HasHttpClient;

    public function create(array $payload): array
    {
        return $this->post('/plan', $payload);
    }

    public function list(array $query = []): array
    {
        return $this->get('/plan', $query);
    }

    public function fetch(string $planCodeOrId): array
    {
        return $this->get("/plan/{$planCodeOrId}");
    }

    public function update(string $planCodeOrId, array $payload): array
    {
        return $this->put("/plan/{$planCodeOrId}", $payload);
    }
}