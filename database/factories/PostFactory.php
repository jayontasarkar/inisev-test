<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $websiteIds = Website::all()->pluck('id')->toArray();
        $title = $this->faker->sentence(4);
        $slug = Str::slug($title);
        return [
            'title'   => $title,
            'slug'    => $slug,
            'website_id' => $this->faker->randomElement($websiteIds)
        ];
    }
}
