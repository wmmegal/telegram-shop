<?php

namespace App\Http\Controllers;

use App\Cart\CartManager;
use Illuminate\Http\Request;
use Log;

class CheckoutController extends Controller
{
    public function __invoke(CartManager $cart, Request $request)
    {
        Log::info(print_r($request->only('query_id', 'user'), true));
        $cart->truncate();
    }
}
