<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram, Request $request)
    {
        $updates = $telegram->getWebhookUpdate();
        Log::info(123123);

        return 'ok';
    }
}
