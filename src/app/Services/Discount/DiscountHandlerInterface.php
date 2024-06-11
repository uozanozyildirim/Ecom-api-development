<?php

namespace App\Services\Discount;

interface DiscountHandlerInterface
{
    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface;

    public function handle(float $totalAmount, array $products): float;
}
