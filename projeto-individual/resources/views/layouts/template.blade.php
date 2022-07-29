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
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color:#111111">
            <div class="container">
                <a class="navbar-brand" href="#">FINANCEIRO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('releases.list')}}">LANÇAMENTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('release.create')}}">NOVO LANÇAMENTO</a>
                        </li>
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
                    &copy 2022 by odenilson marques.
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/scriptFormatCoin.js')}}"></script>
</body>
</html>