<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-600 mb-4">{{ $article->description }}</p>
        <p class="text-sm text-gray-500 mb-4">By {{ $article->user->name }} | {{ $article->created_at->format('F j, Y') }}</p>
        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full max-w-2xl mb-4 rounded-lg shadow-md">
        @endif
        <div class="prose max-w-none mb-4">
            {!! nl2br(e($article->content)) !!}
        </div>
        <div class="flex items-center">
            <form action="{{ route('articles.like', $article) }}" method="POST" class="mr-2">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Like ({{ $article->likes }})</button>
            </form>
            <form action="{{ route('articles.dislike', $article) }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Dislike ({{ $article->dislikes }})</button>
            </form>
        </div>
        <a href="{{ route('articles.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">Back to Articles</a>
    </div>
</body>
</html>
