<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class TokenController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['The supplied credentials are incorrect.'],
            ]);
        }

        $user = $request->user();
        $token = $user->createToken('student-manager-api')->plainTextToken;

        return response()->json([
            'token_type' => 'Bearer',
            'plainTextToken' => $token,
        ]);
    }
}
