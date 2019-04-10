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
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="icon" href="/favicon-100.png" sizes="100x100">
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
        @if(Auth::check())
        @include('partials._cart-slider')
        @endif
        @yield('top')
        <main class="py-4">
            @yield('message')
            @yield('content')

            @yield('bottom')

            <div class="container">

            <hr>
            <div class="d-flex flex-row-reverse navbar-footer">
                    <div><a class="p-2 nav-link" href="{{ route('contact.create') }}">Contact</a></div>
                    <div><a class="p-2 nav-link" href="{{ route('testers') }}">Testers</a></div>
                </div>
            </div>
            <hr>

            <p class="footer small">&copy; Heisenbeans &trade; {{ date('F jS, Y') }}</p>
        </main>
    </div>
    @yield('page_scripts')
    @yield('modals')
    @yield('scripts')
</body>

</html>
