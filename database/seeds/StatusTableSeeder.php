<?php

use Illuminate\Database\Seeder;
use \App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_codes = ['Pending', 'Confirmed'];

        for ($i = 0; $i < count($status_codes); $i++) {
            Status::create([
                'name' => $status_codes[$i]
            ]);
        }
    }
}