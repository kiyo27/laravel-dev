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

                <table class="table-fixed">
                    <thead>
                        <tr>
                            <th class="w-1/4">Title</th>
                            <th class="w-1/4">Tag</th>
                            <th class="w-1/4">Author</th>
                            <th class="w-1/4">Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td><a href="/article/edit/{{$article->id}}">{{$article->title}}</a></td>
                                <td>
                                    @foreach($article->tags as $tag)
                                    <div>
                                        {{$tag->title}}
                                    </div>
                                    @endforeach
                                </td>
                                <td>{{$article->user_id}}</td>
                                <td>{{$article->updated_at}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
