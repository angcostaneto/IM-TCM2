<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{$title or 'Home'}}</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{url('css/client.css')}}"/>
        @stack('styles')
    </head>

    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4 box-shadow">
            <div class="container">
                <a class="navbar-brand" href="#">
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
                            <a href="/home">
                                <button type="button" class="btn btn-outline-success btn-lg">ANUNCIE SEU IMÓVEL</button>
                            </a>
                        @else
                            <a href="/home">Minha conta</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>
        
        <hr/>

        <footer class="footer bg-light">
            <div class="container text-muted">
                <p class="float-right">
                    <a href="#"><button type="button" class="btn btn-primary">Contato</button></a>
                    <a href="#"><button type="button" id="sobrebtn" class="btn btn-primary">Sobre</button></a>
                    <a href="#">Voltar ao topo <span class='ion-chevron-up'></span></a>
                </p>
                <p>Apperitivo Ltda. &copy; Feito com Bootstrap.</p>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="{{url('js/client.js')}}"></script>
        @stack('scripts')
        
    </body>

</html>