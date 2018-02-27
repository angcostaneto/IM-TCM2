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
    <div class="col-md-12 col-sm-12 col-xs-12">
        
        
        @if (isset($user))
            <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{action('Auth\RegisterController@update', $user->id)}}">
            {!!method_field('PUT')!!}
        @else
            <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('register') }}">
        @endif
            {{ csrf_field() }}
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Usuário
                            @if (isset($user))
                                <small>Altere um usuário</small>
                            @else
                                <small>Cadastre um novo usuário</small>
                            @endif
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" type="text" class="form-control col-md-7 col-xs-12" name="name" value="{{$user->name or old('name')}}" required autofocus>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="email" type="email" class="form-control col-md-7 col-xs-12" name="email" value="{{$user->email or old('email')}}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de usuário</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="tipo">
                                    <option>Selecione um tipo</option>
                                    <option value="SuperAdmin" @if(isset($user) && $user->tipo=='SuperAdmin') selected @endif>Super Admin</option>
                                    <option value="Admin" @if(isset($user) && $user->tipo=='Admin') selected @endif>Admin</option>
                                    <option value="Vistoriador" @if(isset($user) && $user->tipo=='Vistoriador') selected @endif>Vistoriador</option>
                                    <option value="Corretor" @if(isset($user) && $user->tipo=='Corretor') selected @endif>Corretor</option>
                                    <option value="Cliente" @if(isset($user) && $user->tipo=='Cliente') selected @endif>Cliente</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="foto" type="file" class="form-control col-md-7 col-xs-12" name="foto">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">RG</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="rg" type="text" class="form-control col-md-7 col-xs-12" name="rg" value="{{$user->rg or old('rg')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">CPF</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="cpf" type="text" class="form-control col-md-7 col-xs-12" name="cpf" value="{{$user->cpf or old('cpf')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" class="form-control col-md-7 col-xs-12" name="password" @if (!isset($user)) required @endif>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirme a senha</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control col-md-7 col-xs-12" name="password_confirmation" @if (!isset($user)) required @endif>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Endereço</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content form-horizontal form-label-left">
                        <br>
                        @include('enderecos.form-user')
                    </div>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
            
        {{csrf_field()}}
        </form>
    </div>
@endsection