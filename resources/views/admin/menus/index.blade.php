<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
            <a href="{{route('admin.menus.create')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg">
                New Menu
            </a>
          </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                 Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descprition
                            </th>
                            
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delele
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu )
                            <tr class="bg-white border-b  dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray">
                                    {{$menu->name}}
                                </th>
                                <td class="px-6 py-4">
                                <div>
                                    <img class="w-32 h-32" src="{{Storage::url($menu->image)}}" alt="">
                                </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{$menu->price}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$menu->description}}
                                </td>
                                
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.menus.edit', ['menu' => $menu->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                                <td
                                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                                >
                                <form method="POST" action="{{ route('admin.menus.destroy', $menu->id) }}" onsubmit="return confirm('Are   you Sure to Delete this Item ?')" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                                        Delete
                                    </button>
                                </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>