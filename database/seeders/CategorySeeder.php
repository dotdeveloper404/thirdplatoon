<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "title" => "Business",
                "category_type" => "ads",
                "image" => "ico-1.png"
            ],
            [
                "title" => "Cars",
                "category_type" => "ads",
                "image" => "ico-2.png"
            ],
            [
                "title" => "Hotels",
                "category_type" => "ads",
                "image" => "ico-3.png"
            ],
            [
                "title" => "Food",
                "category_type" => "ads",
                "image" => "ico-4.png"
            ],
            [
                "title" => "Jobs",
                "category_type" => "ads",
                "image" => "ico-5.png"
            ],
            [
                "title" => "Services",
                "category_type" => "ads",
                "image" => "ico-6.png"
            ]
        ];

        $this->_save_categories($categories);
    }

    private function _save_categories($categories, $parent_id = 0)
    {
        foreach ($categories as $key => $category) {
            $root = Category::create([
                'title' => $category['title'],
                'parent_id' => $parent_id,
                'image' => isset($category['image']) ? $category['image'] : NULL,
                "category_type" => $category['category_type']
            ]);

            if (isset($category["child"]) && count($category["child"]) > 0) {
                $this->_save_categories($category["child"], $root->id);
            }
        }
    }
}
