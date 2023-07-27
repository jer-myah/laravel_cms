<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ $page->meta_description }}">
        <meta name="keywords" content="{{ $page->meta_keywords }}">

        <title>{{ $page->meta_title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <nav class="shadow bg-white mx-4">
            <div class="mx-auto p-5 flex items-center justify-between">
                <a class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer">Logo</a>
                
                <ul class="flex items-center gap-5">
                    <li><a class="hover:text-cyan-500 transition-colors" href="/home">Home</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="">About us</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="">Contact us</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mx-auto px-6 py-8 text-center">
            <div class="mx-auto max-w-lg">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white lg:text-4xl">{{ $page->title }}</h1>
            <p class="mt-6 text-gray-500 dark:text-gray-300">{!! $page->content !!}</p>
            <p class="mt-3 text-sm text-gray-400"><a href="/">Go back to blog</a></p>
            </div>
        </div>

    </body>
</html>