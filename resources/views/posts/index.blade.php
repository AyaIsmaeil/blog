@extends('layouts.root')

@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
<h1 class="mb-4">All Posts</h1>

@foreach ($posts as $post)
    <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <h4 class="card-title">{{ $post->user->name }}</h4>
        <p class="card-text">{{ $post->content }}</p>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">See Post</a>
    </div>
    </div>
@endforeach
@endsection
