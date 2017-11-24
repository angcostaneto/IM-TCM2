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
                        <td>{{ $user->type }}</td>
                        <td>{{ $user->rg }}</td>
                        <td>{{ $user->cpf }}</td>
                        <td>{{ $user->address->cep }}</td>
                        <td>{{ $user->address->street }}</td>
                        <td>{{ $user->address->number }}</td>
                        <td>{{ $user->address->district }}</td>
                        <td>{{ $user->address->city }} - {{ $user->address->state }}</td>
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