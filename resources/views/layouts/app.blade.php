<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav w-100">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{-- config('app.name', 'Tweetcool') --}}
                <img class="logo" src={{asset('img/logo.png')}}></img>
            </a>

            <!-- Light/Dark mode toggle button -->
            <i class="fas fa-moon"></i>
            <input class="btn-toggle-dark-mode" type="checkbox" id="toggleDarkMode">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                        {{--<li class="nav-item">
                            <a class="nav-link" href="{{ route('tweets') }}">tweets</a>
                        </li>--}}
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('profile', auth()->user()->getAuthIdentifier()) }}">My Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="page-footer bg-dark shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-5 flex-center">
                        <!-- Facebook -->
                        <a class="social-icon">
                            <i class="fab fa-facebook-f fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="social-icon">
                            <i class="fab fa-twitter fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Google +-->
                        <a class="social-icon">
                            <i class="fab fa-google-plus-g fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Linkedin -->
                        <a class="social-icon" href="https://www.linkedin.com/in/mark-dioszegi-0668381ab/">
                            <i class="fab fa-linkedin-in fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="social-icon">
                            <i class="fab fa-instagram fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Pinterest-->
                        <a class="social-icon">
                            <i class="fab fa-pinterest fa-lg fa-2x"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright font-weight-bold text-white text-center py-3">© 2020</div>
    </footer>
</div>
</body>
</html>
