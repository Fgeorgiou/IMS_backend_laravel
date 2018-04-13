<?php

use Illuminate\Database\Seeder;
use \App\ArrivalsProduct;
use Carbon\Carbon;

class ArrivalProductsTableSeeder extends Seeder
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
       		ArrivalsProduct::create([
       			'arrival_id' => $faker->numberBetween($min = 1, $max = 10),
       			'product_id' => $faker->numberBetween($min = 1, $max = 50),
       			'quantity' => $faker->numberBetween($min = 1, $max = 8)
       		]);
       	}
    }
}

