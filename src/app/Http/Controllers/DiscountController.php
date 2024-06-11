<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Discount\DiscountService;
use App\Services\Discount\DiscountHandlerFactory;
use App\Repositories\ProductRepositoryInterface;

class DiscountController extends Controller
{
    protected $discountService;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->discountService = new DiscountService(DiscountHandlerFactory::create());
    }

    public function calculateDiscount(Request $request): \Illuminate\Http\JsonResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $products = collect($validated['products'])->map(function ($product) {
            $productData = $this->productRepository->find($product['id']);
            return [
                'id' => $product['id'],
                'price' => $productData->price,
                'quantity' => $product['quantity'],
                'category' => $productData->category,
            ];
        });

        $discount = $this->discountService->calculateDiscount($products, $validated['customer_id']);

        return response()->json($discount);
    }
}
