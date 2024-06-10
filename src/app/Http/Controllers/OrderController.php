<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commands\CreateOrderCommand;
use App\Handlers\CreateOrderHandler;
use App\Queries\GetOrdersQuery;
use App\Handlers\GetOrdersHandler;

class OrderController extends Controller
{
    protected $createOrderHandler;
    protected $getOrdersHandler;

    public function __construct(CreateOrderHandler $createOrderHandler, GetOrdersHandler $getOrdersHandler)
    {
        $this->createOrderHandler = $createOrderHandler;
        $this->getOrdersHandler = $getOrdersHandler;
    }

    public function createOrder(Request $request)
    {
        $command = new CreateOrderCommand($request->customer_id, $request->products);
        $this->createOrderHandler->handle($command);

        return response()->json(['status' => 'Order created'], 201);
    }

    public function getOrders(Request $request)
    {
        $query = new GetOrdersQuery($request->customer_id);
        $orders = $this->getOrdersHandler->handle($query);

        return response()->json($orders);
    }
}