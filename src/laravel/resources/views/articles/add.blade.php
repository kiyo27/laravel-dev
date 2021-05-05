<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="add" method="post">
                        @csrf
                        <div class="grid grid-cols-1 gap-6">
                            <label class="block">
                                <span class="text-gray-700">Title</span>
                                <input type="text" name="title" class="mt-1 block w-full @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                                @error('title')
                                <p class="text-red-500 text-xs italic mt-3">{{ $message }}</p>
                                @enderror
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Body</span>
                                <textarea class="mt-1 block w-full @error('body') border-red-500 @enderror" rows="3" name="body">{{ old('body') }}</textarea>
                                @error('body')
                                <p class="text-red-500 text-xs italic mt-3">{{ $message }}</p>
                                @enderror
                            </label>
                            <div class="block">
                                @foreach($tags as $tag)
                                <label class="inline mr-1">
                                    <input type="checkbox" name="tags[]" value="{{$tag->id}}">
                                    <span class="ml-1">{{$tag->title}}</span>
                                </label>
                                @endforeach
                            </div>
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="send">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
