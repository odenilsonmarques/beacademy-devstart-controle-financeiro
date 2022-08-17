<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    <header class="mb-5">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:#1A1A40">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('assets/img/dollar.png')}}" alt="logo"  width="28" height="28" class="d-inline-block align-text-center mb-2">
                    Financeiro
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                       

                        @if(Auth::user())
                             <li class="nav-item">
                                <a class="nav-link" href="{{route('home')}}">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dash')}}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('releases.list')}}">Lançamentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('release.create')}}">Novo Lançamento</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                    {{-- <li><a class="dropdown-item" href="#">{{ Auth::user()->email }}</a></li> --}}
                                    <li><a class="dropdown-item" href="{{route('user.display')}}">Perfil</a></li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <x-responsive-nav-link class="nav-link" :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('login')}}">Entrar</a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </nav>
    </header>

    <article>
        @yield('content')
    </article>
    <footer>
        <div class="container">
            <div class="row mt-5">
                <div class="col-sm-12 text-center">
                    <span>&copy 2022 by 2ps.com</span>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/scriptFormatCoin.js')}}"></script>
</body>
</html>