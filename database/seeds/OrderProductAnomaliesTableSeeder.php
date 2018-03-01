<?php

use Illuminate\Database\Seeder;
use \App\OrderProductAnomaly;

class OrderProductAnomaliesTableSeeder extends Seeder
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
       		OrderProductAnomaly::create([
       			'order_id' => $faker->numberBetween($min = 1, $max = 10),
       			'product_id' => $faker->numberBetween($min = 1, $max = 10),
       			'quantity' => $faker->numberBetween($min = 1, $max = 10)
       		]);
       	}
    }
}
