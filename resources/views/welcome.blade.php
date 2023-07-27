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
        <nav class="shadow bg-white">
            <div class="mx-auto p-5 flex items-center justify-between">
                <a class="text-2xl hover:text-cyan-500 transition-colors cursor-pointer">Logo</a>
                
                <ul class="flex items-center gap-5">
                    <li><a class="hover:text-cyan-500 transition-colors" href="/">Home</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="">About us</a></li>
                    <li><a class="hover:text-cyan-500 transition-colors" href="">Contact us</a></li>
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
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
