<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<div class="container">
    <!--Создание меню на главной странице layouts/main.blade.php по которому мы позже будем переходить!-->
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('post.index') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('about.index') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('contact.index') }}">Contact</a>
                        </li>

                        @can('view', auth()->user())
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.post.index') }}">Admin</a>
                            </li>
                        @endcan
                    </ul>
                </div>
        </nav>
    </div>
</div>
<body>
<div>
     @yield('content')
</div>
</body>
</html>
