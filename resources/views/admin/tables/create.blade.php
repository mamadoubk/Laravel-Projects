<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Tables</a>
            </div>
            <form method="POST" action="{{ route('admin.tables.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                    <input class="appearance-none @error('name') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" id="name" type="text" placeholder="John Doe">
                </div>
                @error('name')
                    <div class="text-sn text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="guest_number">Guest Number</label>
                    <input class="appearance-none @error('guest_number') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="guest_number" id="guest_number" type="number">
                </div>
                @error('guest_number')
                    <div class="text-sn text-red-400">{{$message}}</div>
                @enderror
                    <div class="mb-4 w-full">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                        <select name="status" id="status" class="form-control @error('status') border-red-400 @enderror w-full">
                            @foreach(App\Enums\TableStatus::cases() as $status)
                                <option value="{{ $status->value }}">{{$status->name}}</option>
                            @endforeach
                         </select>

                    </div>
                    @error('status')
                        <div class="text-sn text-red-400">{{$message}}</div>
                    @enderror
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="location">Location</label>
                        <select name="location" id="location" class="form-control @error('location') border-red-400 @enderror w-full">
                            @foreach(App\Enums\TableLocation::cases() as $location)
                                <option value="{{ $location->value }}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('location')
                        <div class="text-sn text-red-400">{{$message}}</div>
                    @enderror
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Create </button>
                </div>

            </form>

        </div>

    </div>
</x-admin-layout>