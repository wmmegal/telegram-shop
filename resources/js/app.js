import './bootstrap';

import.meta.glob([
    '../img/**',
])

import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import loadMore from "./modules/loadMore.js";

const tg = window.Telegram.WebApp;
tg.ready();
tg.expand();

Alpine.data('loadMore', loadMore)

document.addEventListener('addToCart', () => {
    toggleCheckoutButton();
})

document.addEventListener('livewire:initialized', () => {
    toggleCheckoutButton();
})

document.addEventListener('delete-item', () => {
    toggleCheckoutButton();
})


Livewire.start()

function toggleCheckoutButton() {
    const cartSum = document.querySelector('.cart-sum');

    if (cartSum.textContent !== '0,00 $') {
        tg.MainButton.show();
        tg.MainButton.setParams({
            text: `CHECKOUT`,
            color: '#d7b300'
        });
    } else {
        tg.MainButton.hide();
    }
}



