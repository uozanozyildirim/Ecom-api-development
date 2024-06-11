<?php

namespace App\Services\Discount\Type;

use App\Services\Discount\AbstractDiscountHandler;

class BuyOneGetOneFreeHandler extends AbstractDiscountHandler
{
    public function handle(float $totalAmount, array $products): float
    {
        $discount = 0;

        foreach ($products as $product) {
            if ($product['category'] == 2 && $product['quantity'] >= 6) {
                $discount += $product['price'];
            }
        }

        return $discount + parent::handle($totalAmount, $products);
    }
}
