<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles.css">
    <title>@yield('title')</title>
    <style>
        .border-left{
            border-left: 2px solid #ddd;
        }
        .cards {
            display: grid;
            grid-template-columns: auto auto auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <img src="/images/pngwing.png" class="logo" alt="logo">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('post.create')}}" class="nav-link">add post</a>
                    </li>
                    @auth
                        @can('manageUsers', App\Models\User::class)
                            <li class="nav-item border-left">
                                <a class="nav-link" href="{{route('admin.users.index')}}">Manage Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.categories.index')}}">Manage Categories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/tags">Manage Tags</a>
                            </li>
                        @endcan
                    @endauth
                </ul>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="btn btn-secondary" value="Logout">
            </form>
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
</body>

</html>
