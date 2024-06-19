@extends('layouts.app')
@section('title', 'posts')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>{{$post->title}}</h1>
            <p>{{$post->description}}</p>
        </div>
        <div class="col-4">
            <img src="/images/{{$post->image}}" class="content-image w-100" alt="">
        </div>
    </div>
    <a href="{{route('post.index')}}">back</a>
</div>


@endsection
