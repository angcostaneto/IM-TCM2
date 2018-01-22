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

  <!-- Items do menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>Geral</h3>
        <ul class="nav side-menu">
          <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home
          <li><a><i class="fa fa-building"></i> Imobiliaria <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('imobiliaria') }}">Listar</a></li>
              <li><a href="{{ route('imobiliaria.create') }}">Cadastrar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-home"></i> Residências <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('residencias') }}">Listar</a></li>
              <li><a href="{{ route('residencias.create') }}">Cadastrar</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-user"></i> Usuários <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('users') }}">Listar</a></li>
              <li><a href="{{ route('register') }}">Cadastrar</a></li>
            </ul>
          </li>
        </ul>
      </div>
  </div>

<!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Configurações">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Tela cheia">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Bloquear">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
        <a href="{{route('logout')}}" data-toggle="tooltip" data-placement="top" title="Sair"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
            {{ csrf_field() }}
        </form>
    </div>
    <!-- /menu footer buttons -->
  </div>
</div>