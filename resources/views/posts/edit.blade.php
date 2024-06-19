
@extends('layouts.app')

@section('title', 'edit posts')

@section('content')

    <div class="container">
        <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
            </div>
            <div class="mb-3">
                <img class="content-image" src="/images/{{$post->image}}" alt="">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
