<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden flex">
                @include('admin.partials.sidebar')
                
                <div class="w-full my-5 mx-4">
                    <div class="container mx-auto py-8">
                        <h1 class="text-2xl font-bold mb-6 text-center">Eidt Category</h1>
                        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" 
                                method="POST" action="{{ route('admin.categories.edit', $category->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="name" value="{{ $category->name }}">
                            </div>
                            
                            <button class="w-full bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300"
                                type="submit">Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</x-app-layout>

