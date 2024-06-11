<?php

namespace App\Handlers;

use App\Commands\DeleteOrderCommand;
use App\Repositories\OrderRepositoryInterface;

class DeleteOrderHandler
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function handle(DeleteOrderCommand $command)
    {
        $order = $this->orderRepository->find($command->orderId);

        if (!$order) {
            throw new \Exception('Order not found');
        }

        $this->orderRepository->delete($command->orderId);

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
