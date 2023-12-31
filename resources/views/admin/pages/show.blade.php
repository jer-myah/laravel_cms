<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden flex">
                @include('admin.partials.sidebar')
                
                <div class="w-full my-5 mx-4">
                    @if ($page->categories->isEmpty())                        
                        <form method="POST" action="{{ route('admin.category_page.assign') }}" class="pb-4 border-b">
                            @csrf
                            <div class="relative inline-flex">
                                <select name="category_id" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                    <option>Assign a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="page_id" value="{{ $page->id }}">
                            <button class="bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300"
                                type="submit">Assign Category
                            </button>
                        </form>
                    @endif

                    @if (session()->has('success'))
                        <div class="bg-green-100 border-t border-b border-green-500 text-green-700 mx-8 px-4 py-3" role="alert">
                            <p class="font-bold">Successful</p>
                            <p class="text-sm">{{ session('success') }}</p>
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="bg-red-100 border-t border-b border-red-500 text-red-700 mx-8 px-4 py-3" role="alert">
                            <p class="font-bold">Failed</p>
                            <p class="text-sm">{{ session('error') }}</p>
                        </div>
                    @endif


                    <div class="items-center px-2">
                        <div class="flex items-center justify-between">
                            <a class=" focus:outline-none focus:ring-2">
                                <div class="py-2 px-8 text-gray-700 ">
                                    <p>{{ $page->title }}</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div>
                        {!! $page->content !!}
                    </div>
                    
                </div>
            </div>            
        </div>
    </div>
</x-app-layout>

