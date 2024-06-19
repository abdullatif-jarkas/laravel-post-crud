@extends('layouts.app')
@section('title', 'categories')
@section('content')

    <div class="container">
        <div class="my-5">
            <a href="{{route('admin.categories.create')}}" class="btn btn-success">Add Category</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><img src="/images/{{ $category->image }}" /></td>
                        <td class="d-flex">
                            <a class="btn btn-success" href="/admin/edit/{{ $category->id }}">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="form-control bg-danger text-white" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    There is no categories
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
