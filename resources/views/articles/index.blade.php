@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Articles</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($articles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $article->title }}</h3>
                    <p class="text-gray-600 mb-2">{{ Str::limit($article->description, 100) }}</p>
                    <p class="text-sm text-gray-500 mb-2">By {{ $article->user->name }}</p>
                    <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:underline">Read more</a>
                    <div class="mt-2 flex items-center">
                        <form action="{{ route('articles.like', $article) }}" method="POST" class="mr-2">
                            @csrf
                            <button type="submit" class="text-green-500 hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                            </button>
                        </form>
                        <span class="mr-2">{{ $article->likes }}</span>
                        <form action="{{ route('articles.dislike', $article) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                                </svg>
                            </button>
                        </form>
                        <span>{{ $article->dislikes }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
