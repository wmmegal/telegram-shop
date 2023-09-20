<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class TelegramController extends Controller
{
    /**
     * @throws TelegramSDKException
     */
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        $text = $updates->getMessage()['text'];
        $chatId = $updates->getChat()['id'];

        Log::info($text);
        Log::info($chatId);

        match (true) {
            $text === '/start' => $telegram->sendMessage([
                'chat_id' => $chatId,
                'reply_markup' => [
                    'inline_keyboard' => [
                        [
                            ['text' => 'Открыть магазин', 'web_app' => ['url' => config('app.url')]]
                        ]
                    ],
                ]
            ])
        };

        return 'ok';
    }
}
