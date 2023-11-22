<!DOCTYPE html>
<html>
<head>
    <title>Tamazi Mirianashvili Quiz App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    @stack('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container text-center">
            <a class="btn btn-light" href="{{ route('quizzes.index') }}">View Quizzes</a>
            <a class="btn btn-light" href="{{ route('subscribe.index') }}">Subscription Form</a>
        </div>
    </nav>
    @yield('content')
    @stack('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


