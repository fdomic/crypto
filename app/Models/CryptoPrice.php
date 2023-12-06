<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoPrice extends Model
{
 
    protected $fillable = ['crypto_id', 'price', 'percent_change_15m'];

    public function currency()
    {
        return $this->belongsTo(Crypto::class);
    }
}
