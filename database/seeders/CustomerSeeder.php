<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(5) . '@com',
                'phone' => random_int(100000, 999999),
                'date_of_birth' => Carbon::createFromFormat('Y-m-d', '2021-12-21'),
                'sex' => rand(0, 1) ? 'Male' : 'Female'
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(5) . '@com',
                'phone' => random_int(100000, 999999),
                'date_of_birth' => Carbon::createFromFormat('Y-m-d', '2021-12-21'),
                'sex' => rand(0, 1) ? 'Male' : 'Female'
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(5) . '@com',
                'phone' => random_int(100000, 999999),
                'date_of_birth' => Carbon::createFromFormat('Y-m-d', '2021-12-21'),
                'sex' => rand(0, 1) ? 'Male' : 'Female'
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(5) . '@com',
                'phone' => random_int(100000, 999999),
                'date_of_birth' => Carbon::createFromFormat('Y-m-d', '2021-12-21'),
                'sex' => rand(0, 1) ? 'Male' : 'Female'
            ],
            [
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(5) . '@com',
                'phone' => random_int(100000, 999999),
                'date_of_birth' => Carbon::createFromFormat('Y-m-d', '2021-12-21'),
                'sex' => rand(0, 1) ? 'Male' : 'Female'
            ]
        ]);
    }
}
