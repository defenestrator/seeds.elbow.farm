<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="icon" href="/favicon-100.png" sizes="100x100">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/5.0.10/css/font-awesome.min.css">
    <!-- deferred loading of js -->
    <script src="{{ mix('js/script.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <!-- Page level Styles -->
    @yield('page_styles', '')
</head>
<body>
<div id="app">
    @include('partials._site-nav')
    @yield('top')
    <main class="py-4">
        @yield('message')
        @yield('content')
        @yield('bottom')
        <div class="container">
            <hr>
            <p class="footer small">&copy; Heisenbeans {{ date('F jS, Y') }}</p>
        </div>
    </main>
</div>
@yield('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" crossorigin="anonymous"></script>
@yield('modals')
@yield('scripts')
<script async await src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.3.1/sweetalert2.min.js"></script>
</body>
</html>
