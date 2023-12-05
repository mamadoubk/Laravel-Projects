<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
             @foreach($categories as $category)
                <a href="{{route('categories.show', $category->id )}}">
                    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                        <img class="w-full h-48" src="{{Storage::url($category->image)}}"
                        alt="Image" />
                        <div class="px-6 py-4">
                            <div class="flex mb-2">
                                <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{$category->name}}</span>
                            </div>
                        </div>
                    </div>
                </a>
             @endforeach
        </div>
    </div>
</x-guest-layout>