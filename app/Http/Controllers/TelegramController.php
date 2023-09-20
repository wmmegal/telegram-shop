<?php

namespace App\Http\Controllers;

use App\Actions\StartAction;
use Log;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        $text = $updates->getMessage()['text'] ?? '';
        $chatId = $updates->getChat()['id'] ?? '';

        Log::info(print_r($updates, true));

        match (true) {
            $text === '/start' => (new StartAction())->handle($chatId)
        };

        return 'ok';
    }
}
