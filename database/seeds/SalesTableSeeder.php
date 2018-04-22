<?php

use Illuminate\Database\Seeder;
use \App\Sale;
use \App\SalesProduct;
use Carbon\Carbon;

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
        $dt = Carbon::now();

        Sale::create([
            'id' => 1,
            'created_at' => $dt
        ]);

        SalesProduct::create([
            'sale_id' => 1,
            'product_id' => $faker->numberBetween($min = 1, $max = 50),
            'quantity' => $faker->numberBetween($min = 1, $max = 15),
            'created_at' => $dt
        ]);

        for ($i = 1; $i < 366; $i++) {
            for($j = 0; $j < 5; $j++){
                Sale::create([
                    'created_at' => $dt->copy()->subDays($i)
                ]);

                for($k = 0; $k <= 4; $k++){
                    SalesProduct::create([
                        'sale_id' => DB::table('sales')->max('id'),
                        'product_id' => $faker->numberBetween($min = 1, $max = 50),
                        'quantity' => $faker->numberBetween($min = 1, $max = 15),
                        'created_at' => $dt->copy()->subDays($i)
                    ]);
                }
            }
            }
        }
}