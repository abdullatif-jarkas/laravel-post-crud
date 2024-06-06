@extends('layouts.app')
@section('title', 'test')
@section('content')

<form action="/add" method="POST">
    @method('DELETE')
    @csrf
    <input type="submit" value="Send">
</form>

@endsection
