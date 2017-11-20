@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Tipo</th>
                <th>Foto</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->type }}</td>
                <td><img style="width: 40px;" src="{{ $user->photo }}"></td>
                <td>{{ $user->rg }}</td>
                <td>{{ $user->cpf }}</td>
                <td>{{ $user->address->street }}, {{ $user->address->number }}, 
                    {{ $user->address->district }}, {{ $user->address->city }}, 
                    {{ $user->address->state }}, {{ $user->address->cep }}.
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
        </tbody>
    </table>
@endsection