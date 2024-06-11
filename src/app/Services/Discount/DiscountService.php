<?php

namespace App\Services\Discount;

use App\Services\Discount\DiscountHandlerInterface;
use Illuminate\Support\Collection;

class DiscountService
{
    protected $chain;

    public function __construct(DiscountHandlerInterface $chain)
    {
        $this->chain = $chain;
    }

    public function calculateDiscount(Collection $products, int $customer_id): array
    {
        $totalAmount = $products->sum(function ($product) {
            return $product['price'] * $product['quantity'];
        });

        $discounts = $this->chain->handle($totalAmount, $products->toArray());

        return [
            'totalAmount' => $totalAmount,
            'discounts' => $discounts,
            'finalAmount' => $totalAmount - $discounts,
        ];
    }
}
