<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Psr\Http\Message\RequestInterface;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function __invoke(Api $telegram, RequestInterface $request)
    {

        $updates = $telegram->getWebhookUpdate(request:  $request);
        Log::info(print_r($updates, true));
    }
}
