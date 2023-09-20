<?php

namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTable extends Component
{
    public function deleteItem($itemId): void
    {
        $item = CartItem::find($itemId);

        cart()->delete($item);

        $this->dispatch('delete-item');
    }

    #[On('addToCart')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.cart-table', [
            'items' => cart()->items()
        ]);
    }
}
