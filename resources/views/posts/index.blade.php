@extends('layouts.root')
@section('title', 'All Posts')

@section('nav')
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
@endsection

@section('content')

<a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
<h1 class="mb-4">All Posts</h1>

@foreach ($posts as $post)
    <div class="card" style="width:20%">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <h4 class="card-title">{{ $post->user->name }}</h4>
        <p class="card-text">{{ $post->content }}</p>
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">See Post</a>
    </div>
    </div>
@endforeach
@endsection
