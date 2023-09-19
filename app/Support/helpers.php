<?php

use App\Cart\CartManager;
use App\Filters\FilterManager;
use App\Models\Category;
use App\Support\Flash\Flash;

if ( ! function_exists('cart')) {
    function cart(): CartManager
    {
        return app(CartManager::class);
    }
}

