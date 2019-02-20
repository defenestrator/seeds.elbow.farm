<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

        @if(Auth::user()->email === 'jeremyblc@gmail.com')
            <a class="dropdown-item nav-link" href="/admin/strains"><i class="fa fa-edit"></i> Edit Strains</a>
            <a class="dropdown-item nav-link" href="/admin/strains/create"><i class="fa fa-plus-circle"></i> New Strain</a>
            <hr />
            <a href="{{ route('log-viewer::dashboard') }}" class="dropdown-item nav-link">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
            <a href="{{ route('log-viewer::logs.list') }}" class="dropdown-item nav-link">
                <i class="fa fa-archive"></i> Logs
            </a>
            <hr />
        @endif
        <a class="dropdown-item nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


    </div>
</li>
