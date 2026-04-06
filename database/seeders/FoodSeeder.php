<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Hoa quả', 'Thực phẩm hữu cơ', 'Thực phẩm khô', 'Sản phẩm nổi bật'];
        foreach ($categories as $categoryName) {
            \App\Models\Category::create(['name' => $categoryName]);
        }
        
        \App\Models\Food::factory(10)->create();
    }
}
