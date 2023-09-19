<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Psr\Http\Message\RequestInterface;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram, Request $request)
    {

        $updates = $telegram->getWebhookUpdate();
        Log::info(print_r($request, true));
    }
}
