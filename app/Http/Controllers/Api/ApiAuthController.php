<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MemberBioData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->method() == 'GET') {
            return response()->json(['error' => "Method not allowed, Allowed methods are POST"]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20|unique:users',
            'company' => '',
            'gender' => 'required|string|in:Male,Female,Other,Prefer not to say',
            'nok' => 'required|string|max:255', // next of kin
            'nok_phone' => 'required|string|max:20', // next of kin phone
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'phone' => $request->phone,
            'company' => $request->company,
            'gender' => $request->gender,
        ]);

        // Create bio data
        $bioData = MemberBioData::create([
            'user_id' => $user->id,
            'country' => $request->country,
            'company' => $request->company ?? 'No Company',
            'gender' => $request->gender,
            'next_of_kin' => $request->nok,
            'next_of_kin_phone' => $request->nok_phone,
        ]);

        // Combine user and bio data into a single array
        $userData = array_merge($user->toArray(), [
            'country' => $request->country,
            'company' => $request->company,
            'gender' => $request->gender,
            'next_of_kin' => $bioData->next_of_kin,
            'next_of_kin_phone' => $bioData->next_of_kin_phone,
        ]);

        // Generate token with combined user data in claims
        $token = JWTAuth::claims([
            'user' => $userData
        ])->fromUser($user);

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 86400, // 24 hours in seconds (1440 * 60)
            'message' => 'User registered successfully'
        ], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Get the authenticated user
        $user = auth()->user();

        // Get the user's bio data
        $bioData = MemberBioData::where('user_id', $user->id)->first();

        // Combine user and bio data
        $userData = array_merge($user->toArray(), [
            'next_of_kin' => $bioData->next_of_kin ?? null,
            'next_of_kin_phone' => $bioData->next_of_kin_phone ?? null,
        ]);

        // Generate a token with combined user data
        $token = JWTAuth::claims([
            'user' => $userData
        ])->attempt($credentials);

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 86400, // 24 hours in seconds (1440 * 60)
            'message' => 'Login successful'
        ]);
    }

    public function me(Request $request)
    {
        $user = JWTAuth::user();
        $bioData = MemberBioData::where('user_id', $user->id)->first();

        // Combine user and bio data
        $userData = array_merge($user->toArray(), [
            'next_of_kin' => $bioData->next_of_kin ?? null,
            'next_of_kin_phone' => $bioData->next_of_kin_phone ?? null,
        ]);

        return response()->json([
            'success' => true,
            'user' => $userData
        ]);
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out'
        ]);
    }
}
