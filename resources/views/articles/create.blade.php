@extends('welcome')

@section('content')
<div class="container">
    <h1>Create New Post</h1>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="article">Article</label>
            <textarea name="article" class="form-control" rows="8" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection