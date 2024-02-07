<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return response()->json($user, 200);
    }
}
