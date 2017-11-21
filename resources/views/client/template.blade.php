<!DOCTYPE HTML>
<html>
    <head>
        <title>{{$title or 'Home'}}</title>
        <!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="{{url('css/client.css')}}"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        <script src="{{url('')}}"></script>
            
    </head>

    <body>
        <div class="collapse bg-inverse" id="navbarHeader">
            <div class="container">
                @yield('content')
            </div>
        </div>
        
        <footer class="text-muted">
            <div class="container">
              <p class="float-right">
                <a href="#"><button type="button" class="btn btn-primary">Contato</button></a>
                <a href="#"><button type="button" id="sobrebtn" class="btn btn-primary">Sobre</button></a>
                <a href="#">Voltar ao topo <span class='ion-chevron-up'></span></a>
              </p>
              <p>Apperitivo Ltda. &copy; Feito com Bootstrap.</p>
            </div>
        </footer>
        
    </body>

</html>