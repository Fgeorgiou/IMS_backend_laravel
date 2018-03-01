<?php

use Illuminate\Database\Seeder;
use \App\SalesProduct;

class SaleProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 51; $i++) {
       		SalesProduct::create([
       			'sale_id' => $faker->numberBetween($min = 1, $max = 10),
       			'product_id' => $faker->numberBetween($min = 1, $max = 10),
       			'quantity' => $faker->numberBetween($min = 1, $max = 8)
       		]);
       	}
    }
}
