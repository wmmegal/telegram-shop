<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class);
Route::post('/telegram/webhook', function () {
    $updates = Telegram::getWebhookUpdate();
    Log::info(123123);

    return 'ok';
});
