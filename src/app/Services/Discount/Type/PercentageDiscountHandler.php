<?php

namespace App\Services\Discount\Type;

use App\Services\Discount\AbstractDiscountHandler;

class PercentageDiscountHandler extends AbstractDiscountHandler
{
    protected $percentage;

    public function __construct(float $percentage)
    {
        $this->percentage = $percentage;
    }

    public function handle(float $totalAmount, array $products): float
    {
        $discount = 0;
        if ($totalAmount >= 1000) {
            $discount = $totalAmount * ($this->percentage / 100);
        }

        return $discount + parent::handle($totalAmount, $products);
    }
}
