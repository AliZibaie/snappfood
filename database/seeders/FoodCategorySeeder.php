<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodCategory::factory()->create([
            'food_type' => 'دریایی',
        ]);
        FoodCategory::factory()->create([
            'food_type' => 'جنوبی',
        ]);
        FoodCategory::factory()->create([
            'food_type' => 'شمالی',
        ]);
        FoodCategory::factory()->create([
            'food_type' => 'بلبلی',
        ]);
    }
}
