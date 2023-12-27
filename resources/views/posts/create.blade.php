<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Create Post</h1>
            </div>
            <div class="col-md-6">
                
            </div>
        </div> 
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Create Post</button>
            </div>
        </form>
    </div>
@endsection
