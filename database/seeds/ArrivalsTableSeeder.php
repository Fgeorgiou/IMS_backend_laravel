<?php

use Illuminate\Database\Seeder;
use \App\Arrival;
use Carbon\Carbon;

class ArrivalsTableSeeder extends Seeder
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
            Arrival::create([
                'order_id' => $i,
                'created_at' => Carbon::yesterday()
            ]);
        }

        Arrival::create([
            'order_id' => 11,
            'created_at' => Carbon::now()
        ]);
    }
}
