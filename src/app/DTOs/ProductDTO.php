<?php

namespace App\DTOs;

class ProductDTO
{
    public $id;
    public $price;
    public $quantity;
    public $category;

    public function __construct(int $id, float $price, int $quantity, int $category)
    {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
    }
}
