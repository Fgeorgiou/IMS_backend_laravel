<?php

use Illuminate\Database\Seeder;
use \App\Order;

class OrdersTableSeeder extends Seeder
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
            Order::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 10),
                'status_id' => 1
            ]);
        }
    }
}