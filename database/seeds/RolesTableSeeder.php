<?php

use Illuminate\Database\Seeder;
use \App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $roles = ['Employee', 'Manager', 'Admin'];

        for ($i = 1; $i < 4; $i++) {
	        Role::create([
	        	'id' => $i,
	            'description' => $roles[$i - 1],
	            'access_level' => $i*10
	        ]);
	    }
    }
}
