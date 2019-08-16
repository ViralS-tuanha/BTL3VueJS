<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserApiController extends Controller
{
    protected $user;

    public function __construct(UserService $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return response()->json($this->user->getList(10));
    }

    public function getAll()
    {
        return response()->json($this->user->getAll());
    }

    public function user(Request $request)
    {
        return response()->json($this->user->user($request->all()));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->user->update($id, $request->all()));
    }

    public function destroy($id)
    {
        return response()->json($this->user->destroy($id));
    }
}
