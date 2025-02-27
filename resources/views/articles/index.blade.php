@extends('welcome')

@section('content')
<div class="container mx-auto px-6 py-12 bg-white shadow-xl rounded-xl max-w-5xl border border-gray-300">
    <div class="flex justify-center mb-16">
        <a href="{{ route('articles.create') }}" class="px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-lg font-bold rounded-full shadow-lg hover:scale-105 transition duration-300">
            ➕ Create New Post
        </a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 items-stretch">
        @foreach ($articles as $article)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 hover:shadow-2xl transition duration-300 transform hover:-translate-y-2 flex flex-col h-full">
                @if ($article->photo)
                    <div class="relative">
                        <img src="{{ asset('storage/app/public/photos/' . $article->photo) }}" class="w-full h-56 object-cover" alt="{{ $article->title }}">
                    </div>
                @else
                    <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-6 flex flex-col flex-grow">
                    <h5 class="text-2xl font-bold text-gray-800">{{ $article->title }}</h5>
                    <p class="text-gray-600 mt-3 leading-relaxed">
                        {{ $article->description }}
                    </p>
                    <div class="flex-grow"></div>
                    <div class="mt-6 flex justify-center items-center">
                        <a href="{{ route('articles.show', $article) }}" class="px-5 py-2 bg-blue-500 text-white text-sm font-bold rounded-lg hover:bg-blue-600 transition duration-300">
                            🔍 View Details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

