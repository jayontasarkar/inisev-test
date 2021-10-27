<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $websiteIds = Website::all()->pluck('id')->toArray();
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'website_id' => $this->faker->randomElement($websiteIds)
        ];
    }
}
