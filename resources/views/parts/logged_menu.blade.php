<ul class="nav navbar-nav navbar-right">
  <li class="">
    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      <img src="
          @if(!empty(Auth::user()->photo))
              {{Auth::user()->photo}}
          @else
              {{url('img/user.png')}}
          @endif">
          @isset(Auth::user()->name)
              {{Auth::user()->name}}
          @endisset
      <span class=" fa fa-angle-down"></span>
    </a>
    <ul class="dropdown-menu dropdown-usermenu pull-right">
      <li><a href="javascript:;"> Perfil</a></li>
      <li><a href="javascript:;">Ajuda</a></li>
      <li>
          <a href="{{route('logout')}}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
              <i class="fa fa-sign-out pull-right"></i> Sair
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
              {{ csrf_field() }}
          </form>
      </li>
    </ul>
  </li>
  <li role="presentation" class="dropdown">
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
      <i class="fa fa-envelope-o"></i>
      <span class="badge bg-green">1</span>
    </a>
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
      <li>
        <a>
          <span class="image"><img src="{{url('img/user.png')}}" alt="Profile Image" /></span>
          <span>
            <span>Admin</span>
            <span class="time">3 horas atrás</span>
          </span>
          <span class="message">
            Teste de notificação...
          </span>
        </a>
      </li>
      
        <div class="text-center">
          <a>
            <strong>Ver todas</strong>
            <i class="fa fa-angle-right"></i>
          </a>
        </div>
      </li>
    </ul>
  </li>
</ul>