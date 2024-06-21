
@extends('app')

@section('content')

<div class="login-container w-50 mx-auto mt-5">
    <div class="login-form">
        <h2 class="text-center mb-4">تسجيل الدخول</h2>
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input name="email" type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">كلمة المرور</label>
                <input name="password" type="password" class="form-control" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
            <div class="mt-3 text-center">
                <a href="register">don't have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection
