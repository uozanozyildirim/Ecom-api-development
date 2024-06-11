<?php

namespace App\Repositories;

use App\DTOs\ProductDTO;

interface ProductRepositoryInterface
{
    public function find(int $id): ?ProductDTO;
    public function update(int $id, array $data): bool;
    public function all(): array;
}
