<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'bagasrn',
            'email' => 'bagasrnfull@gmail.com',
            'password' => bcrypt('Password234#'),
            'phone' => '6282234018230',
        ]);

        Category::create([
            'name' => 'Bundling',
        ]);

        Category::create([
            'name' => 'On Sale',
        ]);

        Category::create([
            'name' => 'Imperfect Fruits',
        ]);

        Category::create([
            'name' => 'Fresh Fruits',
        ]);

        Product::create([
            'name' => 'Apel',
            'img' => 'images/apel.jpg',
            'price' => 7000,
            'place' => 'Kabupaten Banyumas',
            'sold' => '313',
            'rating' => 5.0,
            'discount' => 0.1,
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Alpukat',
            'img' => 'images/avocado.jpg',
            'price' => 28000,
            'place' => 'Kota Kediri',
            'sold' => '81',
            'rating' => 5.0,
            'discount' => 0.1,
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'Alpukat Mentega',
            'img' => 'images/alpukatMentega.jpg',
            'price' => 28000,
            'place' => 'Kabupaten Bojonegoro',
            'sold' => '500',
            'rating' => 5.0,
            'discount' => 0.1,
            'category_id' => 4,
        ]);

        Product::create([
            'name' => 'Apel Malang',
            'img' => 'images/apelManalagi.jpg',
            'price' => 11000,
            'place' => 'Kota Batu',
            'sold' => '313',
            'rating' => 5.0,
            'discount' => 0.1,
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'Pisang Cavendish',
            'img' => 'images/pisang.jpg',
            'price' => 9000,
            'place' => 'Kota Boyolali',
            'sold' => '192',
            'rating' => 5.0,
            'discount' => 0.1,
            'category_id' => 4,
        ]);
    }
}
