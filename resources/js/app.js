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

document.addEventListener('addToCart', e => {
    showCheckoutButton();
})

document.addEventListener('livewire:initialized', e => {
    const cartSum = document.querySelector('.cart-sum');

    if (cartSum.textContent !== '0,00 $') {
        showCheckoutButton();
    }
})


Livewire.start()

function showCheckoutButton() {
    tg.MainButton.show();
    tg.MainButton.setParams({
        text: `CHECKOUT`,
        color: '#d7b300'
    });
}



