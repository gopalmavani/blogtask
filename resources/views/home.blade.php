@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1>List of Posts</h1>
            </div>
            <div class="col-md-2">
                <a href="{{ route('posts.create') }}" class="btn btn-primary" style="float: right;">Create</a>
            </div>
        </div>
        <ul class="list-group">
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->content }}</p>
                            <small>Posted on {{ $post->created_at }}</small>
                        </div>
                        <div class="ml-auto">
                            @if($post->user_id == Auth::user()->id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button type="button" class="btn btn-danger" onclick="deletePost({{ $post->id }})">Delete</button>
                            @endif    
                        </div>
                    </li>
                @endforeach

            @else
                <div class="">
                    <p>There is no Posts available</p>
                </div>
            @endif
        </ul>
        <div class="mt-3">
            @if(count($posts) > 0)
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection

<script>
    function deletePost(postId) {
        var result = confirm("Are you sure you want to delete this post?");
        if (result) {
            document.getElementById('delete-form-' + postId).submit();
        }
    }
</script>