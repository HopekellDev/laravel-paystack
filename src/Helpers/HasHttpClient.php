<?php

namespace HopekellDev\Paystack\Helpers;

use HopekellDev\Paystack\Exceptions\PaystackException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

trait HasHttpClient
{
    protected function get(string $endpoint, array $query = []): array
    {
        return $this->send('get', $endpoint, $query);
    }

    protected function post(string $endpoint, array $payload = []): array
    {
        return $this->send('post', $endpoint, $payload);
    }

    protected function put(string $endpoint, array $payload = []): array
    {
        return $this->send('put', $endpoint, $payload);
    }

    protected function delete(string $endpoint, array $payload = []): array
    {
        return $this->send('delete', $endpoint, $payload);
    }

    protected function send(string $method, string $endpoint, array $data = []): array
    {
        $secretKey = config('paystack.secret_key');

        if (!$secretKey) {
            throw new PaystackException('Paystack secret key is missing. Add PAYSTACK_SECRET_KEY to your .env file.');
        }

        $baseUrl = rtrim(config('paystack.base_url', 'https://api.paystack.co'), '/');
        $endpoint = '/' . ltrim($endpoint, '/');

        /** @var Response $response */
        $response = Http::timeout((int) config('paystack.timeout', 30))
            ->withToken($secretKey)
            ->acceptJson()
            ->asJson()
           ->{$method}($baseUrl . $endpoint, $data);

        $json = $response->json();

        if ($response->failed()) {
            throw new PaystackException(
                $json['message'] ?? 'Paystack API request failed.',
                $response->status()
            );
        }

        return ApiResponse::format($json ?? []);
    }
}