<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item = $this->faker->words(2,true);
        return [
            'name' => ucwords($item),
            'slug'  =>Str::slug($item)
        ];
    }
}
