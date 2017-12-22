<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Layout</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <style>
        body {
            padding-top: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ route('posts.index') }}">Admin Panel</a>

        <div class="collapse navbar-collapse" id="navbarsDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('posts.index') }}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Add article </a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container">
        @yield('content')

        <hr>

        <footer>
            Janus Nic Laravel
        </footer>
    </div>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>
</html>