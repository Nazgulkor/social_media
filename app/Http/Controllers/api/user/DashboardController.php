<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\SetAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Vite;

class DashboardController extends Controller
{

    public function setAvatar(SetAvatarRequest $request)
    {
        $request->validated();
        $user = $request->user();
        $path = $request->file('avatar')->store('images/avatars/' . $user->id);
        // Сохраняем аватарку в базе данных
        $user->avatar = $path;
        $user->save();
        return response()->json([
            'message' => 'Фотография успешно загружена',
            'avatar_url' => asset('storage/' . $user->avatar)
        ]);
    }
    public function deleteAvatar(Request $request)
    {

        $user = $request->user();
        if($user->update(['avatar' => null])){
            return response()->json([
                'message' => 'Фотография удалена',
                'avatar_url' => Vite::asset('resources/images/default_avatar.jpg')
            ]);
        }
        return response()->json([
            'message' => 'нельзя удалить статичное фото'
        ]);
    }
}
