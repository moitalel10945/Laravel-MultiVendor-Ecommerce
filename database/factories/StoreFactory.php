<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->company();
        return [
            'name'=>$name,
            'user_id'=>User::factory(),
            'slug'=>Str::slug($name) . '-' . Str::random(5),
            'logo' => $this->faker->imageUrl(200, 200, 'business', true),
            'description'=>$this->faker->sentence()
        ];
    }
}
