<?php

namespace App\Actions;

use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartAction
{
    public function handle($chatId): void
    {
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'Button for open store', 'web_app' => ['url' => config('app.url')]]
                ]
            ],
        ];

        Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Open store',
            'parse_mode' => 'HTML',
            'reply_markup' => new Keyboard($keyboard)
        ]);
    }
}
