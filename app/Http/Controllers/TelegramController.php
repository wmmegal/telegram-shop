<?php

namespace App\Http\Controllers;

use App\Actions\StartAction;
use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        $text = $updates->getMessage()['text'] ?? '';
        $chatId = $updates->getChat()['id'] ?? '';

        match (true) {
            $text === '/start' => (new StartAction())->handle($chatId)
        };

        return 'ok';
    }
}
