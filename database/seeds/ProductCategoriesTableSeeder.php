<?php

use Illuminate\Database\Seeder;
use \App\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $categories = ['Dairy', 'Non-food', 'Vegetables'];

        for ($i = 1; $i < 4; $i++) {
	        ProductCategory::create([
	        	'id' => $i,
	            'name' => $categories[$i - 1],
	        ]);
	    }
    }
}
