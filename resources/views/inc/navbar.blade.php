  <nav class="navbar navbar-dark navbar-static-top" style="background-color:#051C3B;">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed glyphicon glyphicon-align-justify" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            @if (Auth::guest())
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/requests">Public Assistance Center</a></li>
                <li><a href="/announcements">Anouncement</a></li>
                <li><a href="/about">About</a></li>    
              </ul>
              @else
              <ul class="nav navbar-nav">
              <li class="navbar-brand"> <small>Admin's page</small></li>
              </ul>
              @endif
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/announcements/create">Announcement <sup><span class="glyphicon glyphicon-plus"></span></sup></a></li>
                            <li><a href="/announcements">Anouncements</a></li>
                            <li><a href="/register">Register</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
