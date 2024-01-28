<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreForgotPasswordRequest;

use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }
    public function store(StoreForgotPasswordRequest $request)
    {

        $request->validated();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }

 
}
