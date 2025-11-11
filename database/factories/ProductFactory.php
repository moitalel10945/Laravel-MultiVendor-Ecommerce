<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word(),
            'description'=>$this->faker->sentence(),
            'price'=>$this->faker->randomFloat(2,5,500),
            'stock'=>$this->faker->numberBetween(1,80),
            'image'=>$this->faker->image(),
            'category_id'=>Category::factory(),
            'user_id'=>User::factory(),
            'store_id'=>Store::factory()


        ];
    }
}
