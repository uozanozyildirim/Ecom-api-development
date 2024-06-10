<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        return $this->productRepository->create($validated);
    }

    public function show($id)
    {
        return $this->productRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        return $this->productRepository->update($id, $validated);
    }

    public function destroy($id)
    {
        return $this->productRepository->delete($id);
    }
}
