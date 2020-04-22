<nav class="navbar navbar-expand navbar-light navbar-cheeba">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <!-- Left side of Navbar -->
                <ul class="navbar-nav mr-auto" style="padding-left:1rem; padding-right:2em;">
                    <div style="display: flex; align-items:center; align:baseline; ">
                    <li><a class="nav-link" href="/"><img src="/i/logo.png"></a></li>
                    @include('partials._public-nav')
                    </div>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <div style="display: flex; align-items:center; align:baseline; ">

                    @guest
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @else
                    @include('partials._user-nav')

                    @endguest
                </div>
                </ul>

        </div>
    </div>
</nav>
