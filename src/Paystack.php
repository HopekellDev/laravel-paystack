<?php

namespace HopekellDev\Paystack;

use HopekellDev\Paystack\Services\Customers;
use HopekellDev\Paystack\Services\DedicatedVirtualAccounts;
use HopekellDev\Paystack\Services\Plans;
use HopekellDev\Paystack\Services\Transactions;

class Paystack
{
    public static function transactions(): Transactions
    {
        return new Transactions();
    }

    public static function plans(): Plans
    {
        return new Plans();
    }

    public static function customers(): Customers
    {
        return new Customers();
    }

    public static function dedicatedVirtualAccounts(): DedicatedVirtualAccounts
    {
        return new DedicatedVirtualAccounts();
    }
}