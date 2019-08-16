<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\StoreService;

class StoreApiController extends Controller
{
    protected $store;

    public function __construct(StoreService $store)
    {
        $this->store = $store;
    }

    public function index()
    {
        return response()->json($this->store->getList(10));
    }

    public function store(Request $request)
    {
        return response()->json($this->store->store($request->all()));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->store->update($id, $request->all()));
    }

    public function destroy($id)
    {
        return response()->json($this->store->destroy($id));
    }
}
