<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name'   => 'https://picsum.photos/500/300?random='. rand(2,6565),
           'blog_id' => Blog::all()->random()->id
        ];
    }
}
