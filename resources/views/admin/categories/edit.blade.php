
@extends('layouts.app')

@section('title', 'edit category')

@section('content')

    <div class="container">
        <form action="{{route('admin.categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="mb-3">
                <img class="content-image" src="/images/{{$category->image}}" alt="">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
