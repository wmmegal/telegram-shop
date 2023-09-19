import './bootstrap';

import.meta.glob([
    '../img/**',
])

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import loadMore from "./modules/loadMore.js";

Alpine.data('loadMore', loadMore)

Livewire.start()
