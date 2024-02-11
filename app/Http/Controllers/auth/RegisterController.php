<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(StoreRegisterRequest $request)
    {
        $request->validated();

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken($user->email)->plainTextToken;

        event(new Registered($user));
        Auth::login($user);

        return redirect('/')->with(['message'=> 'Подтвердите почту', 'token' => $token]);
    }
}
