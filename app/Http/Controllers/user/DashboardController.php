<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user.dashboard', compact('user'));
    }

    public function setAvatar(SetAvatarRequest $request)
    {

        $request->validated();
        $path = $request->file('avatar')->store('avatars/' . $request->user()->id);
        dd($path);
        return redirect()->back();
    }
}
