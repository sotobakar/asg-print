<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href={{ url('assets/images/icon/favicon.ico') }} type="image/x-icon">
    @vite('resources/css/app.css')
    @yield('css')
</head>

<body>
    <div class="relative bg-gray-50">
        @yield('content')
    </div>
    
    @yield('js')
    @if(Auth::user())
    <script src={{ url('assets/js/customer/index.js') }}></script>
    @endif
</body>

</html>