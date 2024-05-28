<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!--GOOGLEFONTS-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!--BOOTSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--CSS-->
        <link rel="stylesheet" href="/css/main.css">
        <!--JS-->
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-nav bg">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.svg" alt="hdcevents_logo">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                Eventos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/eventos/create" class="nav-link">
                                Criar Eventos
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">
                                    Meus Eventos
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    @csrf
                                    <a href="/logout"
                                        class="nav-link"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                        @endauth
                       @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    Entrar
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">
                                    Cadastrar
                                </a>
                            </li>
                       @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    @if (session('msg'))
                        <p class="msg">
                            {{ session('msg') }}
                        </p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <div class="container-fluid bg">
                <div class="row">
                    <div class="col-sm-4 mt-5 mb-4">

                        <ul class="roboto-regular size-16" id="link">
                            <h4 class="roboto-bold white">Links</h3>
                            <br>
                            <li class="mb-4">
                                <a href="#">Home</a>
                            </li>
                            <li class="mb-4">
                                <a href="#">Produtos</a>
                            </li>
                            <li class="mb-4">
                                <a href="#">Sobre nós</a>
                            </li>
                            <li class="mb-4">
                                <a href="#">Contato</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-4 mt-5 mb-4 contatoFooter">
                        <div>
                            <h2 class="roboto-bold white">
                                Newsletter
                            </h2>
                            <p class="roboto-regular size-16 white">
                                Está com alguma duvida? Entre em contato conosco!
                            </p>
                            <form class="row">
                                <div class="col-auto">
                                    <input class="form-control" type="text" placeholder="Entre em Contato" aria-label="default input example">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-light">Contato</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5 socialFooter">
                        <ul id="Social">
                            <li>
                                <a href="http://">
                                    <img src="/img/Facebook.png" alt="Facebook">
                                </a>
                            </li>
                            <li>
                                <a href="http://">
                                    <img src="/img/Instagram.png" alt="Instagram">
                                </a>
                            </li>
                            <li>
                                <a href="http://">
                                    <img src="/img/YouTube.png" alt="YouTube">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row bgFooterBottom text-center">
                    <div class="col-sm-12">
                        <div class="mb-2 mt-2 roboto-bold-italic size-20 white">
                            HDC Events &copy; 2024
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--ICONS-->
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!--JsBootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
