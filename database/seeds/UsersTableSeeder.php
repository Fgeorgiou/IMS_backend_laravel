<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        User::create([
            'id' => 1,
        	'role_id' => 3,
        	'facility_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'istrator',
            'email' => 'admin@test.com',
            'password' => bcrypt('secret')
        ]);

        for ($i = 1; $i < 11; $i++) {
            User::create([
                'id' => $i + 1,
	        	'role_id' => $faker->numberBetween($min = 1, $max = 2),
	        	'facility_id' => $faker->numberBetween($min = 1, $max = 10),
	            'first_name' => $faker->firstName,
	            'last_name' => $faker->lastName,
	            'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }
}
