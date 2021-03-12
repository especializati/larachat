<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    <link rel="stylesheet" href="{{ url('css/chat.css') }}">

    <script>
        window.Laravel = {!! json_encode([
            'user' => auth()->check() ? auth()->user()->id : ''
        ]) !!}
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
