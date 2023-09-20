<?php

namespace App\Http\Controllers;

use App\Cart\CartManager;
use Log;

class CheckoutController extends Controller
{
    public function __invoke(CartManager $cart)
    {
        Log::info($cart->total());
        $cart->truncate();
    }
}
