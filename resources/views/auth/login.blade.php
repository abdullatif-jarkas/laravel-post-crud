
@extends('app')

@section('content')


<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" value="Login" class="btn btn-primary">

</form>


@endsection
