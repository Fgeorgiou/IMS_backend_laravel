<?php

use Illuminate\Database\Seeder;
use \App\ArrivalProductAnomaly;

class ArrivalProductAnomaliesTableSeeder extends Seeder
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
       		ArrivalProductAnomaly::create([
       			'arrival_id' => $faker->numberBetween($min = 1, $max = 10),
            'status_id' =>  $faker->numberBetween($min = 3, $max = 6),
            'product_barcode' => $faker->ean13,
       			'quantity' => $faker->numberBetween($min = 1, $max = 10)
       		]);
       	}
    }
}
