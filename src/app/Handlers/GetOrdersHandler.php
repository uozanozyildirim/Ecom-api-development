<?php
namespace App\Handlers;

use App\Queries\GetOrdersQuery;
use App\Models\Order;

class GetOrdersHandler
{
    public function handle(GetOrdersQuery $query)
    {
        return Order::where('customer_id', $query->customerId)->get();
    }
}
