<?php

namespace HopekellDev\Paystack\Helpers;

class ApiResponse
{
    public static function format(array $response): array
    {
        return [
            'status' => $response['status'] ?? false,
            'message' => $response['message'] ?? null,
            'data' => $response['data'] ?? null,
            'meta' => $response['meta'] ?? null,
            'raw' => $response,
        ];
    }
}