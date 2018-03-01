<?php

use Illuminate\Database\Seeder;
use \App\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $suppliers = ['Delta', 'Fage', 'Dodoni'];

        for ($i = 1; $i < 4; $i++) {
	        Supplier::create([
                'id' => $i,
	            'name' => $suppliers[$i - 1],
	            'email' => $faker->email
	        ]);
	    }
    }
}
