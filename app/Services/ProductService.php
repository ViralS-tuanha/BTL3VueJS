<?php

namespace App\Services;

use App\Services\BaseService;
use App\Repositories\Products\ProductRepositoryInterface;

class ProductService extends BaseService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repo = $productRepository;
    }
}
