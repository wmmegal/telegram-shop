<?php

namespace App\Http\Controllers;

use App\Actions\StartAction;
use App\Actions\SuccessfulPaymentAction;
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
        $message = $updates->getMessage();
        $chatId = $updates->getChat()['id'] ?? '';
        $text = $message['text'] ?? '';
        $successfulPayment = $message['successful_payment'] ?? '';
        $preCheckoutQueryId = $updates->isType('pre_checkout_query') ? $updates->preCheckoutQuery->get('id') : null;

        match (true) {
            $text === '/start' => (new StartAction())->handle($chatId),
            !is_null($preCheckoutQueryId) => $telegram->answerPreCheckoutQuery([
                'pre_checkout_query_id' => $preCheckoutQueryId,
                'ok' => true,
            ]),
            is_array($successfulPayment) => (new SuccessfulPaymentAction())->handle($successfulPayment, $chatId),
            default => ''
        };

        return 'ok';
    }
}
