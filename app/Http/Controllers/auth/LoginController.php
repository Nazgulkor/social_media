<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(StoreLoginRequest $request)
    {

        $credentials = $request->validated();

        if(Auth::attempt($credentials, $request->boolean('remember'))){
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        throw ValidationException::withMessages([
            'login_error' => trans('auth.failed')
        ]);
    }

    public function destroy(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
