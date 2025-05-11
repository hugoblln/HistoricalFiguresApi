<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class SecurityController extends Controller
{
    public function register(RegisterRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        // Return a response
        return response()->json([
            'message' => 'inscription réussi', 'user' => $user, 'token' => $token], 201);
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
                'message' => 'connecté avec succès',
                 'token' => $token], 200);
        }

        // Return an error response
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
