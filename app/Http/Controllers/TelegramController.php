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

        if ($updates->preCheckoutQuery) {
            $preCheckoutQueryId = $updates->preCheckoutQuery->get('id');
        }

        Log::info($updates);

        match (true) {
            $text === '/start' => (new StartAction())->handle($chatId),
            !is_null($preCheckoutQueryId ?? '') => $telegram->answerPreCheckoutQuery([
                'pre_checkout_query_id' => $preCheckoutQueryId ?? '',
                'ok' => true,
            ]),
            default => ''
        };

        return 'ok';
    }
}
