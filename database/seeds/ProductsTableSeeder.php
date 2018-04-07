<?php

use Illuminate\Database\Seeder;
use \App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $product_names = ['Blue Cheese', 'Blue Jeans', 'Shampoo', 'Tomatoes', 'Batteries', 
                            'Frozen Fish', 'Jambon', 'Wine Bottle', 'Whiskey Bottle', 'Backpack',
                            'Chicken Livers', 'Chicken Legs', 'Chicken Breast', 'Chicken Wings', 'Chicken Whole',
                            'Grapes Black', 'Grapes Red', 'Grapes White', 'Grapes Green', 'Strawberries',
                            'Watermelons', 'Melons', 'Salami', 'Prosciutto', 'Rum',
                            'Bacon', 'Clams', 'Eel', 'Pears', 'Apples',
                            'Turnips', 'Beer', 'Tea', 'Onion Relish', 'Olvies',
                            'Soda', 'Ground Pepper', 'Truffle', 'Lettuce', 'Bread Crumps',
                            'Mayonnaise', 'Ketchup', 'Mustard', 'Barbecue', 'Bananas',
                            'Oregano', 'Salt', 'Flour', 'Ham', 'Dry Yeast'
                      ];

        for ($i = 1; $i <= 50; $i++) {
            Product::create([
                'id' => $i,
	        	'category_id' => $faker->numberBetween($min = 1, $max = 3),
	        	'supplier_id' => $faker->numberBetween($min = 1, $max = 3),
	            'name' => $product_names[$i - 1],
                'barcode' => $faker->ean13,
	            'unit_per_pack' => $faker->numberBetween($min = 1, $max = 40),
	            'unit_net_weight_gr' => $faker->numberBetween($min = 500, $max = 11000),
	            'unit_gross_weight_gr' => $faker->numberBetween($min = 550, $max = 11500),
	            'lead_days' => $faker->numberBetween($min = 0, $max = 10)
            ]);
        }
    }
}
