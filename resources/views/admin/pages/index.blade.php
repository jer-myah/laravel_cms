<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden flex">
                @include('admin.partials.sidebar')
                
                <div class="w-full my-5 mx-4">
                    <div class="items-center px-2">
                        <div class="flex items-center justify-between">
                            <a class=" focus:outline-none focus:ring-2">
                                <div class="py-2 px-8 text-gray-700 ">
                                    <p>Pages</p>
                                </div>
                            </a>
                        
                            <a href="{{ route('admin.pages.create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 mt-4 sm:mt-0 px-4 py-3 bg-teal-700 hover:bg-teal-600 focus:outline-none rounded">
                                <p class="text-sm font-medium leading-none text-white">Add Page</p>
                            </a>
                        </div>
                    </div>

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

                    <div class="table w-full p-2">
                        <table class="w-full border">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            ID
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Title
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center capitalize">
                                            category
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center capitalize">
                                            meta title
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Action
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="overflow-x-auto">
                                @foreach ($pages as $page)   
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">                                    
                                        <td class="p-2 border-r">{{ $loop->index + 1 }} </td>
                                        <td class="p-2 border-r">{{ $page->title }}</td>
                                        <td class="p-2 border-r"> 
                                            @if (! $page->categories->isEmpty()) 
                                                {{ $page->categories[0]->name }}
                                            @else
                                                <form method="POST" action="{{ route('admin.category_page.assign') }}" class="">
                                                    @csrf
                                                    <div class="relative inline-flex">
                                                        <select name="category_id" required class="border border-gray-300 rounded-full text-gray-600 h-10 pl-2 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                                            <option value="">Select Category</option>
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
                                        </td>
                                        <td class="p-2 border-r">{{ $page->meta_title }}</td>
                                        <td>
                                            <a href="{{ route('admin.pages.show', $page->id) }}" class="bg-teal-500 p-2 text-white hover:shadow-lg text-xs font-thin">View</a>
                                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                            <a href="{{ route('admin.pages.destroy', $page->id) }}" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach                                                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</x-app-layout>

