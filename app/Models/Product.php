<?php

namespace App\Models;

use App\Services\CurrencyService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getPriceUsdAttribute()
    {
        return (new CurrencyService())->convert($this->price,'inr','usd');
    }
}
