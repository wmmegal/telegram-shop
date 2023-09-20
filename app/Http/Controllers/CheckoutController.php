<?php

namespace App\Http\Controllers;

use App\Cart\CartManager;
use Log;
use Telegram\Bot\Api;

class CheckoutController extends Controller
{
    public function __invoke(CartManager $cart, Api $telegram)
    {
        Log::info($cart->total());
        $cart->truncate();
    }
}
