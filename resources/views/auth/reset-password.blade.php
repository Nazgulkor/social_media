@extends('layouts.base')


@section('content')
    <form action="{{ route('password.reset') }}" method="post" novalidate>
        @csrf
        <input type="hidden" name="token" value="{{$request->token}}">
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white py-6 rounded-md px-10 max-w-lg shadow-md w-1/2">
                <h1 class="text-center text-lg font-bold text-gray-500">Новый пароль</h1>
                <div class="space-y-4 mt-6">
                    <div class="w-full">
                        <input type="hidden" placeholder="Почта" class="px-4 py-2 bg-gray-50 w-full" name="email"
                            value="{{ old('email', $request->email)}}" />
                    </div>
                    @error('email')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                    <div class="w-full">
                        <input type="password" placeholder="Пароль" class="px-4 py-2 bg-gray-50 w-full" name="password" />
                    </div>
                    @error('password')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                    <div class="w-full">
                        <input type="password" placeholder="Подтвердите пароль" class="px-4 py-2 bg-gray-50 w-full"
                            name="password_confirmation" />
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-600 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <button class="w-full mt-5 bg-indigo-600 text-white py-2 rounded-md font-semibold tracking-tight"
                    type="submit">Поменять</button>
            </div>
        </div>
    </form>
@endsection
