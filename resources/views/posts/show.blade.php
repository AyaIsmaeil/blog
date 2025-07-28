@extends('layouts.root')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            
            <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('storage/' . $post->user->image) }}" class="rounded-circle me-2" width="40" height="40" alt="User Image">
                <p>{{ $post->user->name }}</p>
            </div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <span class="badge bg-primary">{{ $post->category->name}}</span>

            <div class="mt-3">
                @foreach ($post->tags as $tag)
                    <span class="badge bg-success">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    </div>

    <h4>Comments</h4>
    {{-- show comment --}}
    @foreach ($post->comments as $comment)
        <div class="mb-3 p-2 border rounded">
            <div class="d-flex align-items-center mb-1">
                <img src="{{ asset('storage/' . $comment->user->image) }}" class="rounded-circle me-2" width="30" height="30" alt="User Image">
                <p>{{ $comment->user->name }}</p>
            </div>
            <p class="mb-0">{{ $comment->content }}</p>
            {{-- edit comment --}}
            @can('update', $comment)
                <div class="mt-2">
                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    {{-- delete comment --}}
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            @endcan
        
        </div>
    @endforeach
    {{-- add comment --}}
    <div class="mt-3"><a href="{{ route('comments.create', $post->id) }}" class="btn btn-primary">Add Comment</a></div>

@endsection
