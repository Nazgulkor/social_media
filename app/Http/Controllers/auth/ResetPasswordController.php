<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function index(Request $request){
        return view('auth.reset-password', compact('request'));
    }
    public function store(StoreResetPasswordRequest $request){
  
        $request->validated();
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use($request){
                $user->forceFill([
                    'password' => Hash::make($request->password)
                ])->setRememberToken(Str::random(60));
                $user->save();  
            }
        );
        if($status === Password::PASSWORD_RESET){
            return redirect()->route('login')->with('status', trans($status));
        }
        return back()->withErrors('email', trans($status));
    }
}
