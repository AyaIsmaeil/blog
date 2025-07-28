@extends('layouts.root')

@section('content')
    <h2>Edit Post</h2>

    <form method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-select">
                <option value="">None</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tags</label>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        @if ($post->tags->contains($tag->id)) checked @endif>
                    <label class="form-check-label">{{ $tag->name }}</label>
                </div>
            @endforeach
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
