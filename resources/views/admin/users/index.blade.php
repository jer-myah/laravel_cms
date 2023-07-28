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
                                        <td class="p-2 border-r">Role</td>
                                        <td>
                                            <a href="#" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Edit</a>
                                            <a href="#" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
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
