<?php

namespace App\Services\Discount;

use App\Services\Discount\Type\BuyOneGetOneFreeHandler;
use App\Services\Discount\Type\CheapestProductDiscountHandler;
use App\Services\Discount\Type\PercentageDiscountHandler;

class DiscountHandlerFactory
{
    public static function create(): DiscountHandlerInterface
    {
        $percentageDiscountHandler = new PercentageDiscountHandler(10);
        $buyOneGetOneFreeHandler = new BuyOneGetOneFreeHandler();
        $cheapestProductDiscountHandler = new CheapestProductDiscountHandler();

        $percentageDiscountHandler->setNext($buyOneGetOneFreeHandler)
            ->setNext($cheapestProductDiscountHandler);

        return $percentageDiscountHandler;
    }
}
