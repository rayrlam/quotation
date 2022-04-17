<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abicodes')->insert([
            [
                'abi_code' => '22529902',
                'rating_factor' => 0.95,
            ],
            [
                'abi_code' => '46545255',
                'rating_factor' => 1.15,
            ],
            [
                'abi_code' => '52123803',
                'rating_factor' => 1.20,
            ],
        ]);

        DB::table('ages')->insert([
            [
                'age' => 17,
                'rating_factor' => 1.50,
            ],
            [
                'age' => 18,
                'rating_factor' => 1.40,
            ],
            [
                'age' => 19,
                'rating_factor' => 1.30,
            ],
            [
                'age' => 20,
                'rating_factor' => 1.20,
            ],
            [
                'age' => 21,
                'rating_factor' => 1.10,
            ],
            [
                'age' => 22,
                'rating_factor' => 1.00,
            ],
            [
                'age' => 23,
                'rating_factor' => 0.95,
            ],
            [
                'age' => 24,
                'rating_factor' => 0.90,
            ],
            [
                'age' => 25,
                'rating_factor' => 0.75,
            ],
        ]);

        DB::table('postcodes')->insert([
            [
                'postcode_area' => 'LE10',
                'rating_factor' =>1.35,
            ],
            [
                'postcode_area' => 'PE3',
                'rating_factor' => 1.10,
            ],
            [
                'postcode_area' => 'WR2',
                'rating_factor' => 0.90,
            ],
        ]);
    }
}
