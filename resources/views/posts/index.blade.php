@extends('layouts.app')
@section('title', 'posts')
@section('content')

    <div class="container">
        <a href="{{route('post.create')}}" class="btn btn-primary my-5">add post</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">title</th>
                    <th scope="col">image</th>
                    <th scope="col">description</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td><img src="/images/{{ $post->image }}" class="content-image" alt=""></td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <div class="btns d-flex gap-1 mb-1">
                                <a class="btn btn-primary w-50" href="{{route('post.show', $post->id)}}">Show</a>
                                <a class="btn btn-success w-50" href="/edit/{{$post->id}}">Edit</a>
                            </div>
                            <form action="{{route('post.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <input class="form-control bg-danger text-white" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    There is no posts
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
