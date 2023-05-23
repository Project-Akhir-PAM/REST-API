<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username' => 'bagasrn',
            'email' => 'bagasrnfull@gmail.com',
            'password' => bcrypt('Password234#'),
            'phone' => '6282234018230',
        ]);
    }
}
