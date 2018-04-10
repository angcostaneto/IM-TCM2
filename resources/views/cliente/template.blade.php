<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{$title or 'Home'}}</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{url('css/client.css')}}"/>
        @stack('styles')
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark box-shadow" id="nav">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="\img\logo-branco.png" class="img-fluid" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                        </li>
                    </ul>
                    <div class="mt-2 mt-md-0">
                        @if(Auth::guest())
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link barra">/</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link barra">/</a>
                            </li>
                            <a href="/home">
                                <button type="button" class="btn btn-success">ANUNCIE SEU IMÓVEL</button>
                            </a>
                        </ul>
                            
                        @else
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contato</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link barra">/</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link barra">/</a>
                            </li>
                            <a href="/home">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-user" aria-hidden="true"></i>  Minha conta
                                </button>
                            </a>
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main role="main">

            @yield('main')

            <div class="container">
                @yield('content')
            </div>
            <br/>
            <footer class="footer bg-light">
                <div class="container text-center">
                    <a href="#nav" class="black float-right"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
                    <span class="text-muted">2018 - Apperitivo Ltda. &copy; Feito com Bootstrap.</span>
                </div>
            </footer>

            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
            <script src="{{url('js/client.js')}}"></script>
            @stack('scripts')
        
        </main>

    </body>

</html>