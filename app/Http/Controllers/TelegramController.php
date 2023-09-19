<?php

namespace App\Http\Controllers;

use Log;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        Log::info(print_r($updates, true));
    }
}
