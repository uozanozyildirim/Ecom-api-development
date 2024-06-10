<?php
namespace App\Handlers;

use App\Commands\CreateOrderCommand;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CreateOrderHandler
{
    public function handle(CreateOrderCommand $command)
    {
        DB::transaction(function () use ($command) {
            $order = new Order();
            $order->customer_id = $command->customerId;
            $order->products = json_encode($command->products);
            $order->save();
        });
    }
}
