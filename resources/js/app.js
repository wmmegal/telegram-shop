import './bootstrap';

import.meta.glob([
    '../img/**',
])

import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import loadMore from "./modules/loadMore.js";
import axios from "axios";

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

tg.MainButton.onClick(() => {

    axios.post('/checkout').then(() => {

    });
});


Livewire.start()

function toggleCheckoutButton() {
    setTimeout(() => {
        const cartSum = document.querySelector('.cart-sum');

        if (cartSum.textContent === '0,00 $') {
            console.log('hide')
            tg.MainButton.hide();
        } else {
            console.log('show')
            tg.MainButton.show();
            tg.MainButton.setParams({
                text: `CHECKOUT`,
                color: '#d7b300'
            });
        }
    }, 200)
}



