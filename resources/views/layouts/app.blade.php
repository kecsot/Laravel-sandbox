<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-700">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($title))
        <header>
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{$title}}
                </h2>
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


        <div>
            <div class="max-w-7xl mx-auto px-2  space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @if(isset($operations))
                        <div class="mb-4 sm:mb-8">
                            {{$operations}}
                        </div>
                    @endif

                    {{$content}}
                </div>
            </div>
        </div>

        {{ $slot }}
    </main>

    <footer
        class="p-4 bg-white shadow md:flex md:items-center md:justify-between md:p-6 mt-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
            © 2023 <a href="https://flowbite.com/" class="hover:underline">XXX™</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
    </footer>
</div>
</body>
</html>
