<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Menus</a>
            </div>
            <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="appearance-none  @error('name') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="John Doe">
                </div>
                @error('name')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                    <input class="appearance-none border rounded @error('image') border-red-400 @enderror w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" id="image" type="file">
                </div>
                @error('image')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
                    <input class="appearance-none @error('price') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="price" id="price" type="number">

                </div>
                @error('price')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                    <textarea class="appearance-none  @error('description') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" rows="5" placeholder="Please provide additional information..."></textarea>
                </div>
                @error('description')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="Categories">Categories</label>
                    <select name="categories[]" id="categories" class="form-multiselect block w-full mt-1 @error('categories') border-red-400 @enderror" multiple>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('categories')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " type="submit">Create </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>