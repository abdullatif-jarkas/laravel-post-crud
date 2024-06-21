@extends('app')

@section('content')
    {{-- <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>

        <input type="submit" value="Register" class="btn btn-primary">
        <p>already have an account? <a href="{{route('login')}}">Login</a></p>
    </form> --}}

    <div class="register-container w-50 mx-auto mt-5">
        <div class="register-form">
            <h2 class="text-center mb-4">Register</h2>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input name="name" type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="confirm-password" required>
                </div>
                <div class="form-group mb-3">
                    <label for="profile_image">Profile Image</label>
                    <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image">
                    @error('profile_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">إنشاء حساب</button>
                <div class="mt-3 text-center">
                    <span>already have an account? <a href="login">login</a></span>
                </div>
            </form>
        </div>
    </div>



@endsection
