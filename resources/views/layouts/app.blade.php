<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Apperitivo Imóveis') }}</title>

    @include('parts/style')
    @stack('styles')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ url('home') }}" class="site_title"><i class="fa fa-bank"></i> <span>Apperitivo</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="
                    @if(!empty(Auth::user()->photo))
                        {{Auth::user()->photo}}
                    @else
                        {{url('img/user.png')}}
                    @endif" 
                    alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem vindo,</span>
                <h2>
                    @isset(Auth::user()->name)
                        {{Auth::user()->name}}
                    @endisset
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('sidebar.menu')
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{url('img/user.png')}}">
                        @isset(Auth::user()->name)
                            {{Auth::user()->name}}
                        @endisset
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ action('Auth\RegisterController@edit', Auth::user()->id) }}">Perfil</a></li>
                    <li>
                        <a href="{{route('logout')}}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">@if(isset($naoLidas) && !empty($naoLidas) && count($naoLidas)>0) {{count($naoLidas)}} @endif</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    
                    @if(isset($naoLidas) && !empty($naoLidas) && count($naoLidas)>0)
                      @foreach($naoLidas as $naoLida)
                        <li>
                          <a href="{{ route('conversa', [$naoLida->id_conversa]) }}">
                            <i class="fa fa-envelope-o"></i>
                            <span>
                              <span> Nova mensagem</span>
                            </span>
                            <span class="message">
                              {{ str_limit($naoLida->mensagem ?? null, 30, '...') }}
                            </span>
                          </a>
                        </li>
                      @endforeach
                    @else
                      <li>
                        <a>
                          <i class="fa fa-envelope-o"></i>
                          <span>
                            <span>Nenhuma mensagem nova</span>
                          </span>
                        </a>
                      </li>
                    @endif

                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="footer_fixed">
          <div class="pull-right">
            Apperitivo Software &copy; {{date('Y')}}</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @include('parts/js')
    @stack('scripts')
	
  </body>
</html>
