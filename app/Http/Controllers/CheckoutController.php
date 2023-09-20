<?php

namespace App\Http\Controllers;

use App\Cart\CartManager;
use Log;
use Telegram\Bot\Api;

class CheckoutController extends Controller
{
    public function __invoke(CartManager $cart, Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();

        Log::info($cart->total());
        Log::info(print_r($updates, true));
    }
}
