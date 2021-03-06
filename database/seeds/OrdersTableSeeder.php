<?php

use Illuminate\Database\Seeder;
use \App\Order;
use Carbon\Carbon;

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
                'status_id' => 2,
                'created_at' => Carbon::yesterday()
            ]);
        }

        Order::create([
            'user_id' => $faker->numberBetween($min = 1, $max = 10),
            'status_id' => 1,
            'created_at' => Carbon::now()
        ]);

    }
}