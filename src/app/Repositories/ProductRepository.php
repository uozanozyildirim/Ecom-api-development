<?php

namespace App\Repositories;

use App\DTOs\ProductDTO;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function find(int $id): ?ProductDTO
    {
        $product = Product::find($id);

        if (!$product) {
            return null;
        }

        return new ProductDTO(
            $product->id,
            $product->price,
            $product->quantity,
            $product->category
        );
    }

    public function update(int $id, array $data): bool
    {
        $product = Product::find($id);

        if (!$product) {
            return false;
        }

        $product->update($data);
        return true;
    }

    public function all(): array
    {
        $products = Product::all();

        return $products->map(function ($product) {
            return new ProductDTO(
                $product->id,
                $product->price,
                $product->quantity,
                $product->category
            );
        })->toArray();
    }
}
