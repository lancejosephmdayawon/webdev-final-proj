<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Science & Technology',
                'description' => 'All about science, technology, and innovations',
            ],
            [
                'category_name' => 'Literature',
                'description' => 'Books, novels, poetry, and written works',
            ],
            [
                'category_name' => 'Social Studies',
                'description' => 'Human society, culture, and relationships',
            ],
            [
                'category_name' => 'Economics',
                'description' => 'Finance, markets, trade, and resources',
            ],
            [
                'category_name' => 'History',
                'description' => 'Past events, civilizations, and historical analysis',
            ],
        ];

        // Insert using Eloquent
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
