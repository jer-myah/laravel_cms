<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden flex">
                @include('admin.partials.sidebar')
                
                <div class="w-full my-5 mx-4">
                    <div class="container mx-auto py-8">
                        <h1 class="text-2xl font-bold mb-6 text-center">Create Page</h1>
                        <form class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                            type="text" name="title" placeholder="Page Title">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                            type="text" name="content" placeholder="Page Content">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_title">Meta Title</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                            type="text" name="meta_title" placeholder="Meta Title">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="meta-description">Meta Description</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                            type="text" name="meta_description" placeholder="Meta Description">
                        </div>
                        <button
                            class="w-full bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300"
                            type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</x-app-layout>

