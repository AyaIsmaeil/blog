@extends('layouts.root')
@section('title','edit comments')
@section('content')

<h1>edit comments</h1>

<form action="{{ route('comments.update', $comment) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" required>{{ $comment->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">edit</button>
</form>

@endsection