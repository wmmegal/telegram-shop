<?php

namespace App\Actions;

use App\Models\Order;
use Telegram\Bot\Laravel\Facades\Telegram;

class SuccessfulPaymentAction
{
    public function handler(array $successfulPayment, $chatId): void
    {
        $order = Order::find($successfulPayment['invoice_payload']);

        $order->update([
            'payment_id' => $successfulPayment['provider_payment_charge_id'],
            'status' => 'paid'
        ]);

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => "Ваш заказ #$order->id успешно оплачен",
            'parse_mode' => 'HTML',
        ]);
    }
}
