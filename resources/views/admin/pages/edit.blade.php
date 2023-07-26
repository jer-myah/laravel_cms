<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden flex">
                @include('admin.partials.sidebar')
                
                <div class="w-full my-5 mx-4">
                    <div class="container mx-auto py-8">
                        <h1 class="text-2xl font-bold mb-6 text-center">Edit Page</h1>
                        <form method="POST" action="{{ route('admin.pages.update', $page->id) }}" class="w-full mx-auto bg-white p-8 rounded-md shadow-md">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="title" value="{{$page->title}}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
                                <textarea id="editor" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="content">{!! $page->content !!}</textarea>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_title">Meta Title</label>
                                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="meta_title" value="{{ $page->meta_title }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="meta-description">Meta Description</label>
                                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="meta_description" value="{{ $page->meta_description }}">
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="meta-description">Meta Keywords</label>
                                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-500"
                                type="text" name="meta_keywords" value="{{ $page->meta_keywords }}">
                            </div>
                            <button
                                class="w-full bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300"
                                type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder:{
                    uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
                    // uploadUrl:"{{route('ckeditor.upload').'?_token='.csrf_token()}}",
                }
            } )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
        } );
    </script>

</x-app-layout>

