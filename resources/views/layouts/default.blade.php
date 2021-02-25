<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
    <div id="app" class="container">
        @yield('content')
    </div>

    <script src="{{ url('js/app.js') }}"></script>
</body>
</html>
