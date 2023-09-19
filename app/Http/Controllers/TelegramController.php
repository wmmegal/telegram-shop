<?php

namespace App\Http\Controllers;

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
        $results = $telegram->setWebhook(config('telegram.bots.mybot.webhook_url'));
        dump($results);
//        Log::info(print_r($updates, true));
    }
}
