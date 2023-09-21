<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env ('APP_NAME')}} </title>
    @vite (['resources/sass/app.scss',
                'resources/js/app.js'], 'resources/css/app.css')
    <link href="{{ asset('css/misestilos.css')}}" rel="stylesheet" />

</head>

<body>
    <nav class="navbar navbar-expand-lg cabecera">
        <div class="container-fluid">
            <a class="navbar-brand text-beige" href="{{route ('home')}}"><img src="{{asset('img/1.png')}}" class='logo'></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-beige"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-beige" href="{{route('bars.index')}}">Our Bar Selection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-beige" href="{{route('wine.index')}}">Our Wine Selection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-beige" href="{{route ('contact')}}">Contact us</a>
                    </li>
                </ul>
                <span class="navbar-text text-beige">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item text-beige">
                                    <a class="nav-link text-beige" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-beige" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">


                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-beige"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('bars.proposals', Auth::user()) }}">
                                        {{ __('Mis Propuestas') }}
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
                </span>
            </div>
        </div>
    </nav>
    <main class=container>
@yield('content')
    </main>
<x-footer/>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    function confirmar(text,tittle){
        return confirm(text,tittle);
    }
</script>

</body>

</html>
