<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request){
        return $request->user()->hasVerifiedEmail() ?
        redirect()->intended() : 
        view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/')->with('message', 'Почта подтверждена!');
    }
    public function send(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Ссылка подтверждения отправлена на почту!');
    }
}
