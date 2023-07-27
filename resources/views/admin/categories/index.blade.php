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
                                    <p>Categories</p>
                                </div>
                            </a>
                            
                        
                            <a href="{{ route('admin.categories.create') }}" class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 mt-4 sm:mt-0 px-4 py-3 bg-teal-700 hover:bg-teal-600 focus:outline-none rounded">
                                <p class="text-sm font-medium leading-none text-white">Add Category</p>
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
                                            Name
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Description
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
                                @foreach ($categories as $category)
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">                                    
                                        <td class="p-2 border-r">{{ $loop->index + 1 }} </td>
                                        <td class="p-2 border-r">{{ $category->name }}</td>
                                        <td class="p-2 border-r">{{ $category->description }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                            <a href="{{ route('admin.categories.destroy', $category->id) }}" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
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
