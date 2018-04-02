<?php

use Illuminate\Database\Seeder;
use \App\Stock;

class ProductStockSeeder extends Seeder
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
            Stock::create([
                'id' => $i,
	        	'product_id' => $i,
	        	'quantity' => $faker->numberBetween($min = 1, $max = 15),
            ]);
        }
    }
}
