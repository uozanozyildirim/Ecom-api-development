<?php

namespace App\Services\Discount;

abstract class AbstractDiscountHandler implements DiscountHandlerInterface
{
    private $nextHandler;

    public function setNext(DiscountHandlerInterface $handler): DiscountHandlerInterface
    {
        $this->nextHandler = $handler;
        return $handler;
    }

    public function handle(float $totalAmount, array $products): float
    {
        if ($this->nextHandler) {
            return $this->nextHandler->handle($totalAmount, $products);
        }

        return 0;
    }
}
