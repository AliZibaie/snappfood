<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RestaurantCategory::factory()->create([
            'restaurant_type' => 'فست فود',
        ]);
        RestaurantCategory::factory()->create([
            'restaurant_type' => 'دریایی',
        ]);
        RestaurantCategory::factory()->create([
            'restaurant_type' => 'یونانی',
        ]);
        RestaurantCategory::factory()->create([
            'restaurant_type' => 'خانوادگی',
        ]);
    }
}
