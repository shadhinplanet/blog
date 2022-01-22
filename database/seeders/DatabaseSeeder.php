<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
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

        Category::factory(10)->create();

        Blog::factory(50)->create()->each(function($blog){
            // $blog->categories()->attach([
            //     Category::all()->random()->id,
            //     Category::all()->random()->id,
            //     Category::all()->random()->id,
            //     Category::all()->random()->id,
            //     Category::all()->random()->id,
            //     Category::all()->random()->id,
            // ]);
        });



        // Media::factory(500)->create();
    }
}
