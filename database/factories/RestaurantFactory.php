<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>'رستوران',
            'phone'=>'09190728083',
            'score'=>rand(5, 10),
            'account_number'=>123213213,
            'sending_price'=>12313,
            'restaurant_category_id'=>1,
            'user_id'=>1,
            'status'=>rand(0, 1),
        ];
    }
}
