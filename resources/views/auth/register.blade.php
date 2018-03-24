@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
     @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="row wow fadeIn">
        <div class="col-md-6 mb-4">
            @if (isset($user))
                <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{action('Auth\RegisterController@update', $user->id)}}">
                {!!method_field('PUT')!!}
            @else
                <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
            @endif
            
            <div class="card">
                
                <div class="card-header text-center">
                    @if (isset($user))
                        <small>Altere um usuário</small>
                    @else
                        <small>Cadastre um novo usuário</small>
                    @endif
                </div>
                <!-- Card body -->
                <div class="card-body">
                
                    <!-- Material form register -->
                        <div class="md-form">
                            <input id="name" class="form-control" type="text" name="name" value="{{$user->name or old('name')}}" required autofocus>
                            <label for="name" class="font-weight-light">Nome</label>
                        </div>

                        <div class="md-form">
                            <input id="email" class="form-control" type="text" name="email" value="{{$user->email or old('email')}}" required>
                            <label for="email" class="font-weight-light">E-mail</label>
                        </div>

                        <div class="md-form">
                            
                            <select class="select" name="tipo">
                                <option disabled selected>Selecione um tipo</option>
                                <option value="superadmin" @if(isset($user) && $user->tipo=='superadmin') selected @endif>Super Admin</option>
                                <option value="admin" @if(isset($user) && $user->tipo=='admin') selected @endif>Admin</option>
                                <option value="vistoriador" @if(isset($user) && $user->tipo=='vistoriador') selected @endif>Vistoriador</option>
                                <option value="corretor" @if(isset($user) && $user->tipo=='corretor') selected @endif>Corretor</option>
                                <option value="cliente" @if(isset($user) && $user->tipo=='cliente') selected @endif>Cliente</option>
                            </select>
                            <label>Tipo de Usuário</label>
            
                        </div>

                        <div class="md-form">
                            <input id="rg" class="form-control" type="text" name="rg" value="{{$user->rg or old('rg')}}">
                            <label for="rg" class="font-weight-light">RG</label>
                        </div>

                        <div class="md-form">
                            <input id="cpf " class="form-control" type="text" name="cpf" value="{{$user->cpf or old('cpf')}}">
                            <label for="cpf" class="font-weight-light">CPF</label>
                        </div>

                        <div class="md-form">
                            <input id="senha" class="form-control" type="password" name="password" @if (!isset($user)) required @endif>
                            <label for="senha" class="font-weight-light">Senha</label>
                        </div>

                        <div class="md-form">
                            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" @if (!isset($user)) required @endif>
                            <label for="password-confirm" class="font-weight-light">Confirme a senha</label>
                        </div>

                        <div class="md-form">
                            <label for="outros" class="font-weight-light">Imagens</label>
                            <br><br>
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Escolha suas Imgens</span>
                                    <input type="file" name="imagem[]" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Faça upload de 1 ou mais imgens" readonly>
                                </div>
                            </div>
                        </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>

                    <!-- Material form register -->
                
                </div>
                <!-- Card body -->
            
            </div>
            <!-- Card -->
            
        </div>
        <!-- Endereço -->
        @include('enderecos.form')
        <!-- Endereço -->
        
        {{csrf_field()}}
        </form>
        <!-- Mapa -->
        @include('mapa.mapa')
        <!-- Mapa -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $('.select').material_select();
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.area').mask('000.000.000.000.000,00', {reverse: true});
    </script>
@endpush