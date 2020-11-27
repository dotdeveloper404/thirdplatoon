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
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
        	],
        	[
        		'title' => 'Automotive Jobs',
        		'slug' => 'automotive-jobs',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
        	],
			[
        		'title' => 'Business',
        		'slug' => 'business',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
			[
        		'title' => 'Design &amp; Multimedia',
        		'slug' => 'design-multimedia',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
        	],
			[
        		'title' => 'Education Training',
        		'slug' => 'education-training',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
			[
        		'title' => 'Healthcare',
        		'slug' => 'healthcare',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
        	[
        		'title' => 'Human Resource',
        		'slug' => 'human-resource',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
			[
        		'title' => 'Restaurant & Food',
        		'slug' => 'restaurant-food',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
			[
        		'title' => 'Telecommunications',
        		'slug' => 'telecommunications',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
			],
			[
        		'title' => 'Transportation',
        		'slug' => 'transportation',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
        	],
        	[
        		'title' => 'Software',
        		'slug' => 'software',
				'description' => 'Est veniam commodo ad elit pariatur sint laboris commodo consectetur labore elit in dolore velit dolor qui aliqua voluptate reprehenderit anim sunt fugiat exercitation velit amet dolore exercitation dolor est dolor enim aliqua exercitation.',
				'status' => 1
        	]
        ];

        JobCategory::insert($data);
    }
}
