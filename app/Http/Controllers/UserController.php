<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Client\Request;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UserService $userService)
    {
        $data = $request->all();

        try {
            $userService->store($data);
            return response()->json(['message' => 'Users successfully processed']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

}
