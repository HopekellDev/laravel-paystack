# 💳 HopekellDev Laravel Paystack

![Packagist Version](https://img.shields.io/packagist/v/hopekelldev/laravel-paystack)
![PHP Version](https://img.shields.io/packagist/php-v/hopekelldev/laravel-paystack)
![Laravel Version](https://img.shields.io/badge/Laravel-13.x-red)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
![Downloads](https://img.shields.io/packagist/dt/hopekelldev/laravel-paystack)
[![Build Status](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/badges/build.png?b=main)](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/build-status/main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/HopekellDev/laravel-paystack/?branch=main)

---
![Laravel Paystack Banner](https://raw.githubusercontent.com/HopekellDev/laravel-paystack/main/assets/banner.png)
## 🚀 Introduction

**HopekellDev Laravel Paystack** is a modern, lightweight, and fully customizable Paystack SDK built specifically for:

- ⚡ Laravel 13+
- 🧠 PHP 8.3+
- 🧩 Clean architecture
- 🔥 Static method access
- 🛡 Simple exception handling
- 📦 Easy Laravel installation

Built for developers who want a modern Paystack integration without depending on outdated Laravel Paystack libraries.

---

## ✨ Features

- ✅ Laravel 13 support
- ✅ PHP 8.3+ support
- ✅ Static API style
- ✅ Service-based structure
- ✅ Centralized HTTP client
- ✅ Standardized API responses
- ✅ Built-in exception handling
- ✅ Laravel package auto-discovery
- ✅ Easy to extend with more Paystack endpoints

---

## 📦 Installation

```bash
composer require hopekelldev/laravel-paystack
```

Publish the config file:

```bash
php artisan vendor:publish --tag=paystack-config
```

---

## ⚙️ Configuration

Add your Paystack credentials to `.env`:

```env
PAYSTACK_PUBLIC_KEY=pk_test_xxxxxx
PAYSTACK_SECRET_KEY=sk_test_xxxxxx
PAYSTACK_BASE_URL=https://api.paystack.co
PAYSTACK_TIMEOUT=30
```

---

## 🧪 Quick Usage

```php
use HopekellDev\Paystack\Paystack;

$response = Paystack::transactions()->initialize([
    'email' => 'user@email.com',
    'amount' => 500000,
    'callback_url' => route('payment.callback'),
]);

return redirect($response['data']['authorization_url']);
```

---

## 📘 Basic Documentation

### Transactions

#### Initialize Transaction

```php
Paystack::transactions()->initialize([
    'email' => 'user@email.com',
    'amount' => 500000,
]);
```

#### Verify Transaction

```php
Paystack::transactions()->verify($reference);
```

#### List Transactions

```php
Paystack::transactions()->list([
    'perPage' => 50,
]);
```

#### Fetch Transaction

```php
Paystack::transactions()->fetch($transactionId);
```

---

### Plans

#### Create Plan

```php
Paystack::plans()->create([
    'name' => 'Premium Plan',
    'amount' => 100000,
    'interval' => 'monthly',
]);
```

#### List Plans

```php
Paystack::plans()->list();
```

#### Fetch Plan

```php
Paystack::plans()->fetch($planCode);
```

#### Update Plan

```php
Paystack::plans()->update($planCode, [
    'name' => 'Updated Premium Plan',
]);
```

---

### Customers

#### Create Customer

```php
Paystack::customers()->create([
    'email' => 'user@email.com',
    'first_name' => 'John',
    'last_name' => 'Doe',
]);
```

#### Fetch Customer

```php
Paystack::customers()->fetch($emailOrCustomerCode);
```

#### Update Customer

```php
Paystack::customers()->update($customerCode, [
    'first_name' => 'Updated Name',
]);
```

---

### Dedicated Virtual Accounts

#### Create Dedicated Virtual Account

```php
Paystack::dedicatedVirtualAccounts()->create([
    'customer' => $customerCode,
    'preferred_bank' => 'wema-bank',
]);
```

#### Assign Dedicated Virtual Account

```php
Paystack::dedicatedVirtualAccounts()->assign([
    'email' => 'user@email.com',
    'first_name' => 'John',
    'last_name' => 'Doe',
    'phone' => '08000000000',
    'preferred_bank' => 'wema-bank',
    'country' => 'NG',
]);
```

#### List Dedicated Virtual Accounts

```php
Paystack::dedicatedVirtualAccounts()->list();
```

#### Fetch Dedicated Virtual Account

```php
Paystack::dedicatedVirtualAccounts()->fetch($dedicatedAccountId);
```

---

## 📚 Covered Endpoints

### ✅ Transactions

- Initialize Transaction
- Verify Transaction
- List Transactions
- Fetch Transaction
- Charge Authorization
- Transaction Totals
- Export Transactions

### ✅ Plans

- Create Plan
- List Plans
- Fetch Plan
- Update Plan

### ✅ Customers

- Create Customer
- List Customers
- Fetch Customer
- Update Customer
- Validate Customer
- Set Risk Action

### ✅ Dedicated Virtual Accounts

- Create Dedicated Account
- Assign Dedicated Account
- List Dedicated Accounts
- Fetch Dedicated Account
- Deactivate Dedicated Account
- Split Dedicated Account
- Remove Split
- List Available Providers

---

## ⚠️ Error Handling

All failed Paystack API requests throw:

```php
HopekellDev\Paystack\Exceptions\PaystackException
```

Example:

```php
use HopekellDev\Paystack\Exceptions\PaystackException;
use HopekellDev\Paystack\Paystack;

try {
    $response = Paystack::transactions()->verify($reference);
} catch (PaystackException $e) {
    return $e->getMessage();
}
```

---

## 🧱 Package Architecture

```txt
Paystack
├── Services
│   ├── Transactions
│   ├── Plans
│   ├── Customers
│   └── DedicatedVirtualAccounts
├── Helpers
│   ├── Http Client
│   └── Response Formatter
└── Exceptions
```

---

## 🗂 Packaage Folder Structure

```txt
src/
├── Paystack.php
├── PaystackServiceProvider.php
├── Exceptions/
│   └── PaystackException.php
├── Helpers/
│   ├── ApiResponse.php
│   └── HasHttpClient.php
└── Services/
    ├── Transactions.php
    ├── Plans.php
    ├── Customers.php
    └── DedicatedVirtualAccounts.php
```

---

## 🤝 Contributing

Contributions are welcome.

You can help by:

- Adding more Paystack endpoints
- Improving documentation
- Writing tests
- Improving error handling
- Adding Laravel helpers
- Improving developer experience

### How to contribute

1. Fork the repository
2. Create a new branch
3. Commit your changes
4. Push to your branch
5. Open a pull request

---

## 🔥 Roadmap

- [ ] Subscriptions API
- [ ] Transfers API
- [ ] Transfer Recipients API
- [ ] Settlements API
- [ ] Refunds API
- [ ] Disputes API
- [ ] Webhook signature verification
- [ ] Laravel webhook controller helper
- [ ] Retry logic
- [ ] Logging support
- [ ] Pest test suite
- [ ] GitHub Actions CI

---

## 📢 Call for Collaboration

This library is actively open for collaboration and improvement.

If you are a Laravel developer, fintech builder, open-source contributor, or Paystack user, your support is welcome.

Help make this package better by submitting issues, pull requests, endpoint updates, and documentation improvements.

---

## 🛡 License

This package is open-sourced software licensed under the MIT License.

---

## 👨‍💻 Author

**HopekellDev**

Building scalable fintech, SaaS, and backend systems.

---

## ⭐ Support

If this package helps you, please support it by:

- Starring the repository
- Sharing it with Laravel developers
- Reporting bugs
- Suggesting improvements
- Contributing code

---

## 📬 Contact

For support, collaboration, or questions:

- GitHub Issues
- Email: support@hopekelltech.com

---

> Built for Laravel developers who need a clean, modern, and extendable Paystack SDK.