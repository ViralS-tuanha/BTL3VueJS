<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\EloquentRepository;
use Auth;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Product::class;
    }
}
