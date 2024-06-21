@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-between">
                    <h1>{{ $post->title }}</h1>
                    <img src="/images/{{$post->user->profile_image}}" class="rounded-circle shadow" style="width: 50px"  alt="user image">
                </div>
                <div class="d-flex gap-2">
                    <p><strong>Author:</strong> {{ $post->user->name }}</p>
                    <p><strong>Category:</strong> {{ $post->category->name }}</p>
                </div>
                <p class="post-content my-5">{{ $post->description }}</p>
                <p>
                    @foreach ($post->tags as $tag)
                        <span class="badge bg-dark">{{ $tag->name }}</span>
                    @endforeach
                </p>
            </div>
            <div class="col-6">
                <img src="/images/{{ $post->image }}" class="img-fluid" alt="">
            </div>
            @can('delete', $post)
                <form action="{{ route('post.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger"
                        onclick="return confirm('Are you sure you want to delete this post?');">Delete Post</button>
                </form>
            @endcan
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <h3>Comments</h3>
                @foreach ($post->comments as $comment)
                    <div class="comment" id="comment-{{ $comment->id }}" data-aos="zoom-in">
                        <div class="comment-body d-flex align-items-center justify-content-between my-3 p-2 py-3">
                            <div class="comment-content">
                                <div class="user-info d-flex gap-3">
                                    <img src="/images/{{$comment->user->profile_image}}" alt="user_image" style="width: 50px; border-radius: 50%">
                                    <p><strong>{{ $comment->user->name }}</strong></p>
                                </div>
                                <p class="mt-2">{{ $comment->content }}</p>
                            </div>
                            <div class="actions">
                                @can('update', $comment)
                                    <button class="btn btn-sm" onclick="showEditForm({{ $comment->id }})"><i class="fa-regular fa-pen-to-square"></i></button>
                                @endcan
                                @can('delete', $comment)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this comment?');"><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                @endcan
                            </div>
                        </div>

                        <!-- Edit Comment Form -->
                        <form id="edit-form-{{ $comment->id }}" class="edit-form"
                            action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="content-{{ $comment->id }}">Edit Comment</label>
                                <textarea class="form-control" id="content-{{ $comment->id }}" name="content" rows="3" required>{{ $comment->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Comment</button>
                            <button type="button" class="btn btn-secondary"
                                onclick="hideEditForm({{ $comment->id }})">Cancel</button>
                        </form>
                    </div>
                @endforeach

                <hr>

                <h3>Add a Comment</h3>
                <form method="POST" action="{{ route('comments.store', $post->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="content">Comment</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Add Comment</button>
                </form>
            </div>
        </div>


        <script>
            function showEditForm(commentId) {
                document.getElementById('edit-form-' + commentId).style.display = 'block';
            }

            function hideEditForm(commentId) {
                document.getElementById('edit-form-' + commentId).style.display = 'none';
            }
        </script>
    </div>
@endsection
