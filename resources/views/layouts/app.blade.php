<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+ES:wght@100..400&display=swap" rel="stylesheet">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>@yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand logo me-4 text-success" href="/">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('post.create') }}" class="nav-link"><i
                                class="fa-solid fa-square-plus fs-2 text-primary"></i></a>
                    </li>
                    @auth
                        @can('manageUsers', App\Models\User::class)
                            <li class="nav-item border-left">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Manage Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.categories.index') }}">Manage Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tags">Manage Tags</a>
                            </li>
                        @endcan
                    @endauth
                </ul>
                <span class="me-3">
                    {{ Auth::user()->name }}
                </span>
                <div class="me-3 shadow rounded-circle">
                    <img src="{{ 'images/' . Auth::user()->profile_image }}" alt="Profile Image" class="rounded-circle"
                        width="40" height="40">
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" class="btn btn-outline-secondary" value="Logout">
                </form>
            </div>
        </div>
    </nav>



    <div class="content my-5">
        @yield('content')
    </div>
    <footer class="container mt-5 pt-5">
        Made with ❤ By Abdullatif Jarkas
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
