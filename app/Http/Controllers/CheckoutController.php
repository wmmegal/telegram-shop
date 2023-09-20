<?php

namespace App\Http\Controllers;

use App\Cart\CartManager;
use App\Models\CartItem;
use App\Models\Order;
use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class CheckoutController extends Controller
{
    /**
     * @throws TelegramSDKException
     */
    public function __invoke(CartManager $cart, Request $request, Api $telegram)
    {
        $chatId = $request->get('user')['id'];

        $order = Order::create([
            'query_id' => $request->get('queryId'),
            'chat_id' => $chatId,
            'amount' => cart()->total()->raw(),
        ]);

        $orderProducts = cart()->items()->map(function (CartItem $item) {
            return [
                'label' => $item->product->title . ' x ' . $item->quantity,
                'amount' => $item->amount->raw()
            ];
        });

        Log::info(print_r($orderProducts, true));

        $telegram->sendInvoice([
            'chat_id' => $chatId,
            'title' => "Заказ № $order->id",
            'description' => "Оплата заказа",
            'payload' => $order->id,
            'provider_token' => config('telegram.stripe.token'),
            'currency' => 'USD',
            'prices' => $orderProducts,
        ]);

        $cart->truncate();
    }
}
