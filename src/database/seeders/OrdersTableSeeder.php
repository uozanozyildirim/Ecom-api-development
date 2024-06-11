<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            [
                'id' => 1,
                'customer_id' => 1,
                'total' => 112.80,
            ],
            [
                'id' => 2,
                'customer_id' => 2,
                'total' => 219.75,
            ],
            [
                'id' => 3,
                'customer_id' => 3,
                'total' => 1275.18,
            ],
        ]);

        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'product_id' => 102,
                'quantity' => 10,
                'unit_price' => 11.28,
                'total' => 112.80,
            ],
            [
                'order_id' => 2,
                'product_id' => 101,
                'quantity' => 2,
                'unit_price' => 49.50,
                'total' => 99.00,
            ],
            [
                'order_id' => 2,
                'product_id' => 100,
                'quantity' => 1,
                'unit_price' => 120.75,
                'total' => 120.75,
            ],
            [
                'order_id' => 3,
                'product_id' => 102,
                'quantity' => 6,
                'unit_price' => 11.28,
                'total' => 67.68,
            ],
            [
                'order_id' => 3,
                'product_id' => 100,
                'quantity' => 10,
                'unit_price' => 120.75,
                'total' => 1207.50,
            ],
        ]);
    }
}
