<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductApiController extends Controller
{
    protected $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        return response()->json($this->product->getList(10));
    }

    public function store(Request $request)
    {
        return response()->json($this->product->store($request->all()));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->product->update($id, $request->all()));
    }

    public function destroy($id)
    {
        return response()->json($deleteProduct = $this->product->destroy($id));
    }
}
