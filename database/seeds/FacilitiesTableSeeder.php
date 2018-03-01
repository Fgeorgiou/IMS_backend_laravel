<?php

use Illuminate\Database\Seeder;
use \App\Facility;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 11; $i++){
        	Facility::create([
        		'id' => $i,
        		'name' => $faker->name,
        		'email' => $faker->email,
        		'address' => $faker->address
        	]);
        }
    }
}
