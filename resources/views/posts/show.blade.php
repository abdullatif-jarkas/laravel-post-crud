@extends('layouts.app')
@section('title', 'posts')
@section('content')


<h1>{{$post->title}}</h1>
<p>{{$post->description}}</p>
<img src="/images/{{$post->image}}" class="content-image" alt="">
<a href="{{route('post.index')}}">back</a>


@endsection
