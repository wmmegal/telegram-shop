<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    public function __invoke()
    {
        $updates = Telegram::getWebhookUpdate();
        Log::info(123123);

        return 'ok';
    }
}
