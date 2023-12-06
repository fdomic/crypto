<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = ['name','edited'];

    public function cryptoPrices()
    {
        return $this->hasMany(CryptoPrice::class);
    }

    public function scopeLatestPrice($query)
    {
        return $query->join('crypto_prices', 'cryptos.id', '=', 'crypto_prices.crypto_id')
        ->select('cryptos.*', 'crypto_prices.price', 'crypto_prices.percent_change_15m')
        ->latest('crypto_prices.created_at');
    }
}
