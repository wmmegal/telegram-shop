<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'chat_id',
        'query_id',
        'status',
        'payment_id',
        'amount'
    ];

    protected $casts = [
        'amount' => PriceCast::class
    ];
}
