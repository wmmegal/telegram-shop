<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class MiniCart extends Component
{
    #[On('addToCart')]
    public function add($productId, $quantity = 1): void
    {
        if (cart()->inCart($productId)) {
            $cartItem = cart()->getItem($productId)->first();
            cart()->quantity($cartItem, $cartItem->quantity + 1);
        } else {
            cart()->add($productId, $quantity);
        }
    }

    #[On('delete-item')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.mini-cart', [
            'total' => cart()->total()
        ]);
    }
}
