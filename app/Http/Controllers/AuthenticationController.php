<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;
use Throwable;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    use ApiResponse;

    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        DB::beginTransaction();

        try {

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //Login user after successfully registrationcls
            Auth::login($user);

            // Create accessToken for the user
            $user->accessToken =  $user->createToken('accessToken')->accessToken;

            $data = new UserResource($user);
            DB::commit();
            // Return a success response
            return $this->responseWithData('User registered successfully.', $data, 201);
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        
        try {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = $request->user();
    
                // Create accessToken for the user
                $user->accessToken =  $user->createToken('accessToken')->accessToken;
    
                $data = new UserResource($user);
                
                DB::commit();
                // Return a success response
                return $this->responseWithData('User login successfully.', $data, 200);
            } else {
                throw new UnauthorizedException('Unauthorised', 401);
            }
        } catch (Throwable $th) {
            DB::commit();
            throw $th;
        }
    }

    public function logout(Request $request)
    {
        // Get the authenticated user's token
        $token = $request->user()->token();
        // Revoke the token, logging the user out
        $token->revoke();
        // Return response no content
        return response()->noContent();
    }
}
