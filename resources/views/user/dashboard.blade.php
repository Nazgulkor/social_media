@extends('layouts.base')

@section('content')
    <div class="">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img id="dashboard_avatar"
                                src="{{ $user->avatar
                                    ? asset('storage/' . $user->avatar)
                                    : Vite::asset('resources/images/default_avatar.jpg') }}"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                            <p class="text-gray-700">Software Developer</p>
                            <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                <form id="avatar_form">
                                    <label for="avatar_input"
                                        class="bg-gray-800 hover:bg-gray-700 text-white text-sm px-4 py-2.5 outline-none rounded w-max cursor-pointer mx-auto block font-[sans-serif]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mr-2 fill-white inline"
                                            viewBox="0 0 32 32">
                                            <path
                                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                                data-original="#000000" />
                                            <path
                                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                                data-original="#000000" />
                                        </svg>
                                        <span id="avatar_text">
                                            {{ $user->avatar ? 'Поменять фото' : 'Установить фото' }}
                                        </span>
                                        <input type="file" id='avatar_input' class="hidden" name="avatar_input" />
                                    </label>
                                </form>
                                <a id="delete_avatar" href="#"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Удалить фото</a>
                            </div>
                        </div>
                        <hr class="my-6 border-t border-gray-300">
                        <div class="flex flex-col">
                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Контент</span>
                            <ul>
                                <li class="mb-2">
                                    <a href="">
                                        Записи
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="">
                                        Картинки
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="dashboard_content"
                     class="col-span-4 sm:col-span-6 bg-white bg-white shadow rounded-lg p-6 flex flex-col items-center"
                >
                    @forelse($posts as $post)
                        <x-dashboard.post/>
                    @empty
                        У вас пока нет записей Создайте!
                    @endforelse

                </div>

                <div id="dashboard_tools"
                     class="col-span-4 sm:col-span-3 bg-white bg-white shadow rounded-lg p-6 "
                >
                    <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                        Создать запись
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
