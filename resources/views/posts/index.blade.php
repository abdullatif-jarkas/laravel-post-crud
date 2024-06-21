@extends('layouts.app')
@section('title', 'posts')
@section('content')

    <div class="container">
        <div class="cards">
            @forelse ($posts as $post)
                <div class="card mb-3" style="max-width: 700px; margin: 0 auto;" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/images/{{ $post->image }}" class="img-fluid rounded-start object-fit-cover h-100"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column h-100 justify-content-between">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->description }}</p>
                                <div class="card-actions d-flex align-items-center justify-content-end">
                                    <a class="btn" href="{{ route('post.show', $post->id) }}"><i class="fa-solid fa-eye"></i></a>
                                    @auth
                                        @can('update', $post)
                                            <a class="btn" href="/edit/{{ $post->id }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endcan
                                    @endauth
                                    @auth
                                        @can('delete', $post)
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></button>
                                            </form>
                                        @endcan
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                There is no posts
            @endforelse
        </div>
    </div>

@endsection
