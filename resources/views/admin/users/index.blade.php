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
                                    <p>Users</p>
                                </div>
                            </a>                            
                        
                            <button class="focus:ring-2 focus:ring-offset-2 focus:ring-teal-600 mt-4 sm:mt-0 px-4 py-3 bg-teal-700 hover:bg-teal-600 focus:outline-none rounded">
                                <p class="text-sm font-medium leading-none text-white">Add User</p>
                            </button>
                        </div>
                    </div>

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
                                            Email
                                        </div>
                                    </th>
                                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                        <div class="flex items-center justify-center">
                                            Role
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
                                @foreach ($users as $user)
                                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">                                    
                                        <td class="p-2 border-r">{{ $loop->index + 1 }} </td>
                                        <td class="p-2 border-r">{{ $user->name }}</td>
                                        <td class="p-2 border-r">{{ $user->email }}</td>
                                        <td class="p-2 border-r">{{ $user->role_name }}</td>
                                        <td>
                                            @if ($user->role_name == 'Editor')
                                                <button onclick="updateModal(true)" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit Role</button>
                                                <button onclick="deleteModal(true)" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach                                                                
                            </tbody>
                        </table>
                        {{-- Edit modal --}}
                        <!-- overlay -->
                        <div id="modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 flex justify-center items-start md:items-center pt-10 md:pt-0">
                            <!-- modal -->
                            <div id="modal" class="opacity-0 transform -translate-y-full scale-150 relative bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
                            
                                <!-- button close -->
                                <button 
                                    onclick="updateModal(false)"
                                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                                    &cross;
                                </button>
                            
                                <!-- header -->
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <h2 class="text-xl font-semibold text-gray-600">Change Role</h2>
                                </div>
                            
                                <!-- body -->
                                <div class="p-3">
                                    <form class="w-full max-w-sm p-4 mx-auto bg-white rounded-md shadow-md" 
                                            method="POST" action="">
                                        @csrf
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Select Role</label>
                                            <select name="role_id" required class="border border-gray-300 rounded-full text-gray-600 h-10 pl-4 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="-mt-2 mb-4 text-red-700">{{ $error }}</div>
                                            @endforeach
                                        @endif
                                        
                                        <button class="w-full bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300"
                                            type="submit">Update
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Delete modal --}}
                        <div id="del_modal_overlay" class="hidden absolute inset-0 bg-black bg-opacity-30 flex justify-center items-start md:items-center pt-10 md:pt-0">
                            <!-- modal -->
                            <div id="del_modal" class="opacity-0 transform -translate-y-full scale-150 relative bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
                            
                                <!-- button close -->
                                <button 
                                    onclick="deleteModal(false)"
                                    class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                                    &cross;
                                </button>
                            
                                <!-- header -->
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <h2 class="text-xl font-semibold text-gray-600">Delete User</h2>
                                </div>
                            
                                <!-- body -->
                                <div class="p-3">
                                    <div class="w-full max-w-sm p-4 mx-auto bg-white rounded-md shadow-md">                                        
                                        <div class="mb-4">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Are you sure?</label>
                                            
                                        </div>                                       
                                        <div class="flex justify-between">
                                            <a href="{{ route('admin.users.delete', $user->id) }}" class="w-full bg-teal-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-teal-600 transition duration-300">
                                                Delete
                                            </a>
                                            <button onclick="deleteModal(false)" class="ml-4 w-full bg-red-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-red-600 transition duration-300"
                                                type="button">Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>            
        </div>
    </div>

    
<script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');
    
    function updateModal (value){
        const modalCl = modal.classList
        const overlayCl = modal_overlay
    
        if(value){
            overlayCl.classList.remove('hidden')
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
        } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }
    updateModal(false);

    const del_modal_overlay = document.querySelector('#del_modal_overlay');
    const del_modal = document.querySelector('#del_modal');

    function deleteModal (value){
        const del_modalCl = del_modal.classList
        const del_overlayCl = del_modal_overlay
    
        if(value){
            del_overlayCl.classList.remove('hidden')
            setTimeout(() => {
                del_modalCl.remove('opacity-0')
                del_modalCl.remove('-translate-y-full')
                del_modalCl.remove('scale-150')
            }, 100);
        } else {
            del_modalCl.add('-translate-y-full')
            setTimeout(() => {
                del_modalCl.add('opacity-0')
                del_modalCl.add('scale-150')
            }, 100);
            setTimeout(() => del_overlayCl.classList.add('hidden'), 300);
        }
    }
    deleteModal(false);
    </script>

    </x-app-layout>
