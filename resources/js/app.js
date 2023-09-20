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
    tg.MainButton.show();
    tg.MainButton.setParams({
        text: `CHECKOUT`,
        color: '#d7b300'
    });
})


Livewire.start()




