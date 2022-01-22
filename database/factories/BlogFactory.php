<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();

        return [
            'name'  => $name,
            'category_id'  => Category::all()->random()->id,
            'slug'  => Str::slug($name),
            'featured_image'  => 'https://picsum.photos/500/300?random='. rand(2,6565),
            'description'  => '<h3>'.$this->faker->sentence().'</h3>' . '<p>' . $this->faker->paragraphs(5,true) . '</p>',
        ];
    }
}
