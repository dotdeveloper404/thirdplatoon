<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			[
        		'title' => 'Accounting / Finance',
        		'slug' => 'accounting-finance',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
        	],
        	[
        		'title' => 'Automotive Jobs',
        		'slug' => 'automotive-jobs',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
        	],
			[
        		'title' => 'Business',
        		'slug' => 'business',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
			[
        		'title' => 'Design & Multimedia',
        		'slug' => 'design-multimedia',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
        	],
			[
        		'title' => 'Education Training',
        		'slug' => 'education-training',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
			[
        		'title' => 'Healthcare',
        		'slug' => 'healthcare',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
        	[
        		'title' => 'Human Resource',
        		'slug' => 'human-resource',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
			[
        		'title' => 'Restaurant & Food',
        		'slug' => 'restaurant-food',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
			[
        		'title' => 'Telecommunications',
        		'slug' => 'telecommunications',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
			],
			[
        		'title' => 'Transportation',
        		'slug' => 'transportation',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
        	],
        	[
        		'title' => 'Software',
        		'slug' => 'software',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.'
        	]
        ];

        JobCategory::insert($data);
    }
}
