<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Restaurants', 'icon' => '🍽️'],
            ['name' => 'Coffee & Tea', 'icon' => '☕'],
            ['name' => 'Health & Fitness', 'icon' => '💪'],
            ['name' => 'Real Estate', 'icon' => '🏠'],
            ['name' => 'Professional Services', 'icon' => '💼'],
            ['name' => 'Local Shops', 'icon' => '🛍️'],
            ['name' => 'Nightlife', 'icon' => '🍸'],
            ['name' => 'Automotive', 'icon' => '🚗'],
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'icon' => $cat['icon'],
            ]);
        }
    }
}
