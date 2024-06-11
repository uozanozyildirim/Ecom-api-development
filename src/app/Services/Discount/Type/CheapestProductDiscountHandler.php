<?php

namespace App\Services\Discount\Type;

use App\Services\Discount\AbstractDiscountHandler;
use Illuminate\Support\Collection;

class CheapestProductDiscountHandler extends AbstractDiscountHandler
{
    public function handle(float $totalAmount, array $products): float
    {
        $discount = 0;
        $productsCollection = collect($products);

        $category1Products = $productsCollection->filter(function ($product) {
            return $product['category'] == 1;
        });

        if ($category1Products->count() >= 2) {
            $cheapestProduct = $category1Products->sortBy('price')->first();
            $discount += $cheapestProduct['price'] * 0.20;
        }

        return $discount + parent::handle($totalAmount, $products);
    }
}
