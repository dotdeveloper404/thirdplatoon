<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                "Name" => "Veículos",
                "Image" => "vehicles.png"

            ],
            [
                "Name" => "Serviços",
                "Image" => "services.png"
            ],
            [
                "Name" => "Currículos",
                "Image" => "resumes.png"
            ],
            [
                "Name" => "Empregos",
                "Image" => "jobs.png"
            ],
            [
                "Name" => "Cursos e Aulas",
                "Image" => "courses and classes.png"
            ],
            [
                "Name" => "Imóveis",
                "Image" => "homes.png"
            ],
            [
                "Name" => "Compra e Venda",
                "Image" => "buyandsell.png"
            ],
            [
                "Name" => "Vestibulares e Concursos",
                "Image" => "contest.png"
            ],
            [
                "Name" => "Música, Arte & Fashion",
                "Image" => "music.png"
            ],
            [
                "Name" => "Férias e Temporada",
                "Image" => "holiday.png"
            ],
            [
                "Name" => "Negócios e Oportunidades",
                "Child" => [
                    ["Name" => "Franquias / Franchising"],
                    ["Name" => "Idéias / Parcerias e Investidores"]
                ],
                "Image" => "business oppurtunities.png"
            ],

        ];

        $this->_save_categories($categories);
    }

    private function _save_categories($categories, $parent_id = 0)
    {
        //TODO: Sluggable package required.
        $index = 0;
        foreach ($categories as $key => $category) {
            $root = factory(Category::class)->create([
                'sort_order' => $index,
                'name' => $category['Name'],
                'parent_id' => $parent_id,
                'category_image' => isset($category['Image']) ? $category['Image'] : NULL
            ]);

            if (isset($category["Child"]) && count($category["Child"]) > 0) {
                $this->_save_categories($category["Child"], $root->id);
            }
            $index++;
        }
    }
}
