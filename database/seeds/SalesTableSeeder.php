<?php

use Illuminate\Database\Seeder;
use \App\Sale;

class SalesTableSeeder extends Seeder
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
          Sale::create([
            'id' => $i
          ]);
        }
    }
}