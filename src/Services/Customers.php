<?php

namespace HopekellDev\Paystack\Services;

use HopekellDev\Paystack\Helpers\HasHttpClient;

class Customers
{
    use HasHttpClient;

    public function create(array $payload): array
    {
        return $this->post('/customer', $payload);
    }

    public function list(array $query = []): array
    {
        return $this->get('/customer', $query);
    }

    public function fetch(string $emailOrCustomerCode): array
    {
        return $this->get("/customer/{$emailOrCustomerCode}");
    }

    public function update(string $customerCode, array $payload): array
    {
        return $this->put("/customer/{$customerCode}", $payload);
    }

    public function validateCustomer(string $customerCode, array $payload): array
    {
        return $this->post("/customer/{$customerCode}/identification", $payload);
    }

    public function setRiskAction(string $customerCode, array $payload): array
    {
        return $this->post("/customer/set_risk_action", array_merge($payload, [
            'customer' => $customerCode,
        ]));
    }
}