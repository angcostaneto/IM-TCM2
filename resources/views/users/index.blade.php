@extends('layouts.app')

@section('content')
    <div class="row wow fadeIn">
        <div class="col-md-12 mb-6">
            <div class="card">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br />
                    @endif
                <div class="card-header text-center">
                    Usuários
                    <span class="float-right">
                        <a href="{{ route('register') }}">
                            <i class="fa fa-plus mr-3"></i>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-sm">
                        <thead class="blue lighten-4 text-center">
                            <tr>
                                <th scope="row">Id</th>
                                <th scope="row">Nome</th>
                                <th scope="row">E-mail</th>
                                <th scope="row">Tipo</th>
                                <th scope="row">RG</th>
                                <th scope="row">CPF</th>
                                <th scope="row" colspan="2">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->id }}</a></td>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->name }}</a></td>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->email }}</a></td>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->tipo }}</a></td>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->rg }}</a></td>
                                    <td><a href="{{ action('Auth\RegisterController@edit', $user->id) }}">{{ $user->cpf }}</a></td>
                                    <td>
                                        <form action="{{ action('Auth\RegisterController@destroy', $user) }}" method="POST">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-small btn-danger" type="submit">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection