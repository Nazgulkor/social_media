@extends('layouts.base')

@section('content')
    <div class="flex items-center gap-4">
        <img class="w-10 h-10 rounded-full"
            src="{{ Auth::user()->avatar ? asset('storage/app/' . Auth::user()->avatar) : Vite::asset('resources/images/default_avatar.png') }}"
            alt="">
        <div class="font-medium ">
            <div>{{ Auth::user()->name }}</div>
            <div class="text-sm text-gray-500 ">Joined in August 2014</div>
        </div>
    </div>
@endsection
