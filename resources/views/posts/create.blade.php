@extends('layouts.root')

@section('content')
    <h2>Create New Post</h2>

    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select" >
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    <label class="form-check-label">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>
        @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary">Create</button>
    </form>
@endsection
