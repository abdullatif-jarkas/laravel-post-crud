@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create Tag</h1>
            <form action="{{ route('tags.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
