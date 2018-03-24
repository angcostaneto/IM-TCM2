<div class="sidebar-fixed position-fixed">
    <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
    </a>
    <div class="list-group list-group-flush">
        <a href="#" class="{{ Request::is('dashboard') ? 'active' : '' }} list-group-item waves-effect">
            <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="{{ url('residencias') }}" class="{{ Request::is('residencias') ? 'active' : '' }} list-group-item list-group-item-action waves-effect">
            <i class="fa fa-home mr-3"></i>Residências
        </a>
        <a href="{{ url('users') }}" class="{{ Request::is('users') ? 'active' : '' }} list-group-item list-group-item-action waves-effect">
            <i class="fa fa-user mr-3"></i>Usuários
        </a>
    </div>
</div>