<?php

namespace App\Http\Controllers;

use App\Actions\StartAction;
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
        $updates = $telegram->getWebhookUpdate();
        $text = $updates->getMessage()['text'] ?? '';
        $chatId = $updates->getChat()['id'] ?? '';
        $preCheckoutQueryId = $updates->has('preCheckoutQuery') ? $updates->preCheckoutQuery->get('id') : null;

        Log::info(print_r($updates, true));

        match (true) {
            $text === '/start' => (new StartAction())->handle($chatId),
            !is_null($preCheckoutQueryId) => $telegram->answerPreCheckoutQuery([
                'pre_checkout_query_id' => $preCheckoutQueryId,
                'ok' => true,
            ]),
            default => ''
        };

        return 'ok';
    }
}
