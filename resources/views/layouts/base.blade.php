<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Catobook')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="app" class="@yield('app-class', 'layout')">

        @if (session()->has('success'))
            <div class="container">
                @if(is_array(session()->get('success')))
                    @foreach (session()->get('success') as $message)
                        <div class="alert alert-success alert-dismiss">
                            {{ $message }}
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-success alert-dismiss">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        @endif

        @yield('nav')
        @yield('main')
    </div>
</body>
</html>
