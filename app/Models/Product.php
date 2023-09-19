<?php

namespace App\Models;

use App\Casts\PriceCast;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => PriceCast::class
    ];

    public function thumb(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('storage/' . $value)
        );
    }
}
