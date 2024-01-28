@extends('layouts.base')


@section('content')
    <form action="{{ route('login') }}" method="post" novalidate>
        @csrf
        @error('login_error')
            <div class="error_alert">
                {{ $message }}
            </div>
        @enderror
        <div class="flex items-center justify-center h-screen">
            <div class="bg-white py-6 rounded-md px-10 max-w-lg shadow-md w-1/2">
                <h1 class="text-center text-lg font-bold text-gray-500">Войти</h1>
                <div class="space-y-4 mt-6">
                    <div class="w-full">
                        <input type="email" placeholder="Почта" class="px-4 py-2 bg-gray-50 w-full" name="email"
                            value="{{ old('email') }}" />
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
                    <input checked id="remember" type="checkbox" name="remember"
                        class="checkbox">
                    <label for="remember"
                        class="label_for_checkbox">Запомнить меня</label>
                </div>

                <button class="w-full mt-5 bg-indigo-600 text-white py-2 rounded-md font-semibold tracking-tight"
                    type="submit">Войти</button>
                   <a class="text-blue-600 mt-2 d-block" href="{{route('forgot-password')}}">Забыли пароль?</a> 
            </div>
        </div>
    </form>
@endsection
