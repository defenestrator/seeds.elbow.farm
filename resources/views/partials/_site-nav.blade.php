<nav class="navbar navbar-expand-md navbar-light navbar-elbow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/i/heisenhead-60.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @include('partials._guest-nav')
                @guest
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                @include('partials._user-nav')
                @endguest
            </ul>
        </div>
    </div>
</nav>
