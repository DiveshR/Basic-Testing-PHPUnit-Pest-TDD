<?php
namespace App\Services;

class CurrencyService
{
    const RATES = [
        'inr' => [
            'usd' => 0.012,
        ]
        ];

public function convert(float $amount, string $currencyFrom, string $currencyTo): float
{
    $rate = self::RATES[$currencyFrom][$currencyTo] ?? 0;
    return round($amount * $rate ,2);
}

}