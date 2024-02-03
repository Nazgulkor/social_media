<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('user.dashboard', compact('user'));
    }

    public function setAvatar(Request $request)
    {
        $userId = Auth::user()->id;
        $data = $request->all();
        $filename = $data['avatar']->getClientOriginalName();
        $data['avatar']->move(Storage::path('/public/image/avatars/')."$userId/",$filename);
        return redirect()->back();
    }
}
