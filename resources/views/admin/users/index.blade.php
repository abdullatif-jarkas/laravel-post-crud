@extends('layouts.app')
@section('title', 'users')
@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Image</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="/images/{{ $user->profile_image }}" alt="" class="shadow" style="width: 50px; border-radius: 50%"></td>
                        <td>
                            @can('manageUsers', $user)
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="form-control bg-danger text-white" type="submit" value="Delete">
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    There is no users
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
