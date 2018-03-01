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

        for ($i = 1; $i < 11; $i++) {
            Product::create([
                'id' => $i,
	        	'category_id' => $faker->numberBetween($min = 1, $max = 3),
	        	'supplier_id' => $faker->numberBetween($min = 1, $max = 3),
	            'product_name' => $faker->lastName,
	            'unit_per_pack' => $faker->numberBetween($min = 1, $max = 40),
	            'unit_net_weight_gr' => $faker->numberBetween($min = 500, $max = 11000),
	            'unit_gross_weight_gr' => $faker->numberBetween($min = 550, $max = 11500),
	            'lead_days' => $faker->numberBetween($min = 0, $max = 10)
            ]);
        }
    }
}
