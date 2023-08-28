<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_convert_inr_to_usd_successful(): void
    {
        $this->assertEquals(12,(new CurrencyService())->convert(1000,'inr','usd'));
    }

    public function test_convert_inr_to_eur_returns_zero(): void
    {
        $this->assertEquals(0,(new CurrencyService())->convert(1000,'inr','eur'));
    }

}
