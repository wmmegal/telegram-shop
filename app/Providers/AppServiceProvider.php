<?php

namespace App\Providers;

use App\Cart\CartManager;
use App\Cart\IdentityStorageContract;
use App\Cart\SessionIdentityStorage;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IdentityStorageContract::class, SessionIdentityStorage::class);
        $this->app->singleton(CartManager::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::macro('image', fn($asset) => $this->asset("resources/img/$asset"));
    }
}
