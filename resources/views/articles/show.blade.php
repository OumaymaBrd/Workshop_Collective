@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-64 object-cover">
        @endif
        <div class="p-6">
            <h1 class="text-3xl font-semibold mb-4">{{ $article->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $article->description }}</p>
            <div class="prose max-w-none mb-6">
                {!! nl2br(e($article->content)) !!}
            </div>
            <p class="text-sm text-gray-500 mb-4">By {{ $article->user->name }} | {{ $article->created_at->format('F j, Y') }}</p>
            <div class="flex items-center">
                <form action="{{ route('articles.like', $article) }}" method="POST" class="mr-2">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Like ({{ $article->likes }})
                    </button>
                </form>
                <form action="{{ route('articles.dislike', $article) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Dislike ({{ $article->dislikes }})
                    </button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ route('articles.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Back to Articles</a>
@endsection
