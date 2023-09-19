<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory()->createMany([
            [
                'title' => 'Bibimbap',
                'price' => 650,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/bibimbap.png'), 'bibimbap.png')
            ],
            [
                'title' => 'Burger',
                'price' => 399,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/burger.png'), 'burger.png')
            ],
            [
                'title' => 'Burger + Coke',
                'price' => 500,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/burger_coke.png'), 'burger_coke.png')
            ],
            [
                'title' => 'Coca-Cola',
                'price' => 150,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/coke.png'), 'coke.png')
            ],
            [
                'title' => 'Cookie',
                'price' => 100,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/cookie.png'), 'cookie.png')
            ],
            [
                'title' => 'Diet',
                'price' => 400,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/diet.png'), 'diet.png')
            ],
            [
                'title' => 'Donat',
                'price' => 200,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/donut.png'), 'donut.png')
            ],
            [
                'title' => 'Donat 2',
                'price' => 210,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/donut2.png'), 'donut2.png')
            ],
            [
                'title' => 'Fast food',
                'price' => 600,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/fast-food.png'), 'fast-food.png')
            ],
            [
                'title' => 'Flan',
                'price' => 300,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/flan.png'), 'flan.png')
            ],
            [
                'title' => 'Fries',
                'price' => 150,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/fries.png'), 'fries.png')
            ],
            [
                'title' => 'Hamburger',
                'price' => 350,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/hamburger.png'), 'hamburger.png')
            ],
            [
                'title' => 'Hotdog',
                'price' => 200,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/hotdog.png'), 'hotdog.png')
            ],
            [
                'title' => 'Ice cream',
                'price' => 150,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/icecream.png'), 'icecream.png')
            ],
            [
                'title' => 'Pizza',
                'price' => 650,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/pizza.png'), 'pizza.png')
            ],
            [
                'title' => 'Pizza 2',
                'price' => 680,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/pizza2.png'), 'pizza2.png')
            ],
            [
                'title' => 'Popcorn',
                'price' => 170,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/popcorn.png'), 'popcorn.png')
            ],
            [
                'title' => 'Ramen',
                'price' => 500,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/ramen.png'), 'ramen.png')
            ],
            [
                'title' => 'Salad',
                'price' => 360,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/salad.png'), 'salad.png')
            ],
            [
                'title' => 'Tako',
                'price' => 300,
                'thumb' => Storage::disk('public')->putFileAs('images/products', new File('tests/Fixtures/images/tako.png'), 'tako.png')
            ]
        ]);
    }
}
