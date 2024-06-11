<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'name' => 'Türker Jöntürk',
                'since' => Carbon::create('2014', '06', '28'),
                'revenue' => 492.12,
            ],
            [
                'id' => 2,
                'name' => 'Kaptan Devopuz',
                'since' => Carbon::create('2015', '01', '15'),
                'revenue' => 1505.95,
            ],
            [
                'id' => 3,
                'name' => 'İsa Sonuyumaz',
                'since' => Carbon::create('2016', '02', '11'),
                'revenue' => 0.00,
            ],
        ]);
    }
}
