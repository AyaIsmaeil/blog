@extends('layouts.root')

@section('title','add comments')

@section('content')

<h1>add comments</h1>

<form action="{{ route('comments.store', $post) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" id="content" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">add</button>
</form>

@endsection
