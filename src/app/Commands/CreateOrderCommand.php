<?php
namespace App\Commands;

class CreateOrderCommand
{
    public $customerId;
    public $products;

    public function __construct($customerId, $products)
    {
        $this->customerId = $customerId;
        $this->products = $products;
    }
}
