<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Geral</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home
        <li><a><i class="fa fa-home"></i> Residências <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('residencias') }}">Listar</a></li>
            <li><a href="{{ route('residencias.create') }}">Cadastrar</a></li>
          </ul>
        </li>
        @if(Auth::user()->tipo=='superadmin')
          <li><a><i class="fa fa-user"></i> Usuários <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ url('users') }}">Listar</a></li>
              <li><a href="{{ route('register') }}">Cadastrar</a></li>
            </ul>
          </li>
        @endif
        <li><a><i class="fa fa-envelope"></i> Mensagens <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('mensagensEnviadas', Auth::user()->id) }}">Mensagens Enviadas</a></li>
            <li><a href="{{ route('mensagensRecebidas', Auth::user()->id ) }}">Mensagens Recebidas</a></li>
          </ul>
        </li>
      </ul>
    </div>
</div>