<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getAllUsers() 
    {
        $users = User::whereNot('id', Auth::id())->get();
        return UserResource::collection($users);
    }

    public function me()
    {
        return new UserResource(Auth::user());
    }
}
