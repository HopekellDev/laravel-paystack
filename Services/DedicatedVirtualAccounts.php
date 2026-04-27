<?php

namespace HopekellDev\Paystack\Services;

use HopekellDev\Paystack\Helpers\HasHttpClient;

class DedicatedVirtualAccounts
{
    use HasHttpClient;

    public function create(array $payload): array
    {
        return $this->post('/dedicated_account', $payload);
    }

    public function assign(array $payload): array
    {
        return $this->post('/dedicated_account/assign', $payload);
    }

    public function list(array $query = []): array
    {
        return $this->get('/dedicated_account', $query);
    }

    public function fetch(int|string $dedicatedAccountId): array
    {
        return $this->get("/dedicated_account/{$dedicatedAccountId}");
    }

    public function deactivate(int|string $dedicatedAccountId): array
    {
        return $this->delete("/dedicated_account/{$dedicatedAccountId}");
    }

    public function split(int|string $dedicatedAccountId, array $payload): array
    {
        return $this->post("/dedicated_account/split", array_merge($payload, [
            'account' => $dedicatedAccountId,
        ]));
    }

    public function removeSplit(int|string $dedicatedAccountId): array
    {
        return $this->delete("/dedicated_account/split", [
            'account' => $dedicatedAccountId,
        ]);
    }

    public function providers(): array
    {
        return $this->get('/dedicated_account_available_providers');
    }
}