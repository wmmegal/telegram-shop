<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram)
    {
        $updates = $telegram->getWebhookUpdate();
        Log::info(print_r($updates->getChat(), true));
        Log::info(print_r($updates->getMessage(), true));

        return 'ok';
    }
}
