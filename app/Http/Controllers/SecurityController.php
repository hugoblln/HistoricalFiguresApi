<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class SecurityController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Return a response
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        // Attempt to log the user in
        if (auth()->attempt($validatedData)) {
            // Generate a new token
            $token = auth()->user()->createToken('Personal Access Token')->plainTextToken;

            // Return a response
            return response()->json([
                'message' => 'User logged in successfully',
                 'token' => $token], 200);
        }

        // Return an error response
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
