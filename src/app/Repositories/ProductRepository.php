<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->model->find($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->model->find($id);
        return $product->delete();
    }
}
