<?php

namespace App\Commands;

class DeleteOrderCommand
{
    public $orderId;

    public function __construct(int $orderId)
    {
        $this->orderId = $orderId;
    }
}
