<?php

namespace App\Http\Controllers;

use Log;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        Log::info(1);
    }
}
