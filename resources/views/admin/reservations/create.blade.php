<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">List Reservations</a>
            </div>
            <form method="POST" action="{{ route('admin.reservations.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">First Name</label>
                    <input class="appearance-none @error('first_name') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" id="first_name" type="text" placeholder="DIENTA">
                </div>
                @error('first_name')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Last Name</label>
                    <input class="appearance-none @error('last_name') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" id="last_name" type="text" placeholder="Mamadou">
                </div>
                @error('last_name')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="tel_number">Telephone</label>
                    <input class="appearance-none @error('tel_number') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tel_number" id="tel_number" type="tel" placeholder="Enter Your Phone Number Please">
                </div>
                @error('tel_number')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input class="appearance-none @error('email') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="johndoe@example.com">
                </div>
                @error('email')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="res_date">Reservation Date</label>
                    <input class="appearance-none @error('res_date') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="res_date" id="res_date" type="datetime-local">
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="table_id">Table</label>
                    <select name="table_id" id="table_id" class="w-full @error('table_id') border-red-400 @enderror">
                        @foreach($tables as $table)
                            <option value="{{$table->id}}">{{$table->name}} with ({{$table->guest_number}} Guests)</option>
                        @endforeach
                    </select>
                </div>
                @error('table_id')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="guest_id">Guest Number</label>
                    <input class="appearance-none  @error('guest_number') border-red-400 @enderror border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="guest_number" id="guest_number" type="number">
                </div>
                @error('guest_number')
                    <div class="text-sm text-red-400">{{$message}}</div>
                @enderror
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border rounded focus:outline-none focus:shadow-outline" type="submit">Submit </button>
                </div>
            </form>
        </div>

    </div>
</x-admin-layout>