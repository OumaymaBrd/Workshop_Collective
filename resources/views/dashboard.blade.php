@extends('layouts.writer')

@section('title', 'Writer Dashboard')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}</h2>
    <p class="mb-4">Your role is: {{ Auth::user()->role }}</p>
    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white p-4 rounded-lg text-center hover:bg-blue-600">
            Add New Article
        </a>
        <a href="{{ route('articles.my_articles') }}" class="bg-green-500 text-white p-4 rounded-lg text-center hover:bg-green-600">
            View My Articles
        </a>
    </div>
@endsection
