<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commands\CreateOrderCommand;
use App\Commands\DeleteOrderCommand;
use App\Handlers\CreateOrderHandler;
use App\Handlers\DeleteOrderHandler;
use App\Repositories\OrderRepositoryInterface;

class OrderController extends Controller
{
    protected $createOrderHandler;
    protected $deleteOrderHandler;

    public function __construct(CreateOrderHandler $createOrderHandler, DeleteOrderHandler $deleteOrderHandler)
    {
        $this->createOrderHandler = $createOrderHandler;
        $this->deleteOrderHandler = $deleteOrderHandler;
    }

    public function index(OrderRepositoryInterface $orderRepository)
    {
        return $orderRepository->all();
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $command = new CreateOrderCommand($validated['customer_id'], $validated['products']);
        $order = $this->createOrderHandler->handle($command);

        return response()->json($order, 201);
    }

    /**
     * @throws \Exception
     */
    public function destroy($id)
    {
        $command = new DeleteOrderCommand($id);
        return $this->deleteOrderHandler->handle($command);
    }
}