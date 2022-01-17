<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Media;
use App\Models\User;
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
            'name'  => 'Demo',
            'email' => 'a@a.com',
            'password' => bcrypt('123'),
        ]);

        Blog::factory(50)->create();
        Media::factory(500)->create();
    }
}
