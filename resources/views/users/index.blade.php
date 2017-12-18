@extends('layouts.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
         @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Usuários</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>CEP</th>
                        <th>Logradouro</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade/Estado</th>
                        <th>Ações</th>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->tipo }}</td>
                        <td>{{ $user->rg }}</td>
                        <td>{{ $user->cpf }}</td>
                        <td>@if (!empty($user->endereco->cep)){{$user->endereco->cep}} @endif</td>
                        <td>@if (!empty($user->endereco->rua)){{$user->endereco->rua}} @endif</td>
                        <td>@if (!empty($user->endereco->numero)){{$user->endereco->numero}} @endif</td>
                        <td>@if (!empty($user->endereco->bairro)){{$user->endereco->bairro}} @endif</td>
                        <td>
                            @if (!empty($user->endereco->cidade)){{$user->endereco->cidade}} @endif
                            @if (!empty($user->endereco->estado)){{$user->endereco->estado}} @endif
                        </td>
                        <td>
                            <div class="inline">
                                <a class="btn btn-small btn-info" href="{{ action('Auth\RegisterController@edit', $user->id) }}">Editar</a>
                                <form action="{{ action('Auth\RegisterController@destroy', $user) }}" method="POST">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-small btn-danger" type="submit">Deletar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection