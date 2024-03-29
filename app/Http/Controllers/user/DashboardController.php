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
        $posts = Auth::user()->posts;
        return view('user.dashboard', compact(['user', 'posts']));
    }


}
