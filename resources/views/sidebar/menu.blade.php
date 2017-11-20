<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Geral</h3>
      <ul class="nav side-menu">
        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home
        <li><a><i class="fa fa-building"></i> Imobiliaria <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('realstates') }}">Listar</a></li>
            <li><a href="{{ route('realstates.create') }}">Cadastrar</a></li>
          </ul>
        </li>
        <li><a><i class="fa fa-home"></i> Residências <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ url('residences') }}">Listar</a></li>
            <li><a href="{{ route('residences.create') }}">Cadastrar</a></li>
          </ul>
        </li>
      </ul>
    </div>
</div>