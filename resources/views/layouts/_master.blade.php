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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Great+Vibes|Roboto+Condensed:300">
    <!-- deferred loading of js -->
    <script src="{{ mix('js/script.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <!-- Page level Styles -->
    @yield('page_styles', '')
</head>
<body>
<div id="app">
<div id="modal-overlay" class="modal-overlay" v-on:click="toggleCartSlider()"></div>
    @include('partials._site-nav')
    <div class="d-flex flex-row-reverse cart-slider-wrapper">
        <div id="cart-slider" class="cart-slider">
            <div class="container cart-slider-contents">
            <h4>Shopping Cart</h4>
             <p>is currently under development.</p>
            </div>
        </div>
        <i class="fa fa-lg fa-dark fa-shopping-cart cart-slider-button" id="cart-slider-button" v-on:click="toggleCartSlider()"></i>
</div>

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
@yield('modals')
@yield('scripts')
</body>
</html>
