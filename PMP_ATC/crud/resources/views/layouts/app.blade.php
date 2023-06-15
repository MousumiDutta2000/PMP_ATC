<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Layout</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
