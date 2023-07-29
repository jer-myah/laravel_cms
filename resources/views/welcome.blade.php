<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <nav class="shadow bg-white mx-4">
            <div class="mx-auto p-5 flex items-center justify-between">
                <a class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer">Logo</a>
                
                <ul class="flex items-center gap-5">
                    <li><a class="hover:text-cyan-500 transition-colors" href="/home">Home</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="">About us</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="{{ route('login') }}">Login</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex">
                <div class="w-[25%]">
                    <p class="font-semibold text-lg underline pb-4">Categories</p>
                    @foreach ($categories as $category)
                        <div class="pb-4">
                            <p class="">
                                <a href="{{ route('welcome', $category->id) }}">{{ $category->name }}</a>
                            </p>                            
                        </div>
                    @endforeach
                </div>
                <!-- component -->
                <section class="bg-white dark:bg-gray-900">
                    <div class="container px-6 py-4 mx-auto">
                        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Pages</h1>
                        @if (! $pages->isEmpty())
                        <div class="grid grid-cols-1 gap-6 mt-4 md:mt-8 md:grid-cols-2">
                            @foreach ($pages as $page)
                                <div class="flex ">
                                    <img class="object-cover h-16 rounded-lg md:w-32" src="https://ehiscms.s3.af-south-1.amazonaws.com/{{$page->image}}" alt="">

                                    <div class="mx-2">
                                        <a href="{{ route('page.show', $page->id) }}" class="block text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                            {{ $page->title }}
                                        </a>
                                        
                                        <p class="text-sm text-gray-500 dark:text-gray-300">On: {{ $page->created_at }}</>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @else
                        <div class='max-w-md mx-auto space-y-6'>            
                            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                                <div class="mx-auto max-w-screen-sm text-center">
                                    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">Oops!</h1>
                                    <p class="mb-4 text-3xl tracking-tight font-bold text-black md:text-4xl">No content found</p>
                                    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">There are no content(s) for the selected category. </p>
                                </div>   
                            </div>            
                        </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
