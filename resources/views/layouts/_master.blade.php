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
        @auth
        @include('partials._cart-slider')
        @endauth
        @yield('top')
        <main class="py-2">
            <div class="p-4">
                @if ($errors->any())
                <div class="col-md-4 offset-md-4 alert alert-danger">
                    <ul style="margin:0;">
                        @foreach ($errors->all() as $error)
                        <li style="padding:0.5rem; list-style-type:none; text-transform:uppercase;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @yield('message')
            </div>
            @yield('content')

            @yield('bottom')

            <div class="container">

            <hr>
            <div class="d-flex flex-row-reverse navbar-footer">
                    <div><a class="p-2 nav-link" href="{{ route('strains.index') }}">Strains</a></div>
                    <div><a class="p-2 nav-link" href="https://forum.thecheebashack.com">Forum</a></div>
                    <div><a class="p-2 nav-link" href="{{ route('contact.create') }}">Contact</a></div>
                    {{-- <div><a class="p-2 nav-link" href="{{ route('testers') }}">Testers</a></div> --}}
                </div>
            </div>
            <hr>
            <div class="container">
                <p class="footer small">&copy; The Cheeba Shack {{ date('F jS, Y') }}</p>
            </div>
        </main>
    </div>
    @yield('page_scripts')
    @yield('modals')
    @yield('scripts')
</body>

</html>
