@extends('layouts.app')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Razão Social</th>
                <th>Nome Fantasia</th>
                <th>CNPJ</th>
                <th>CRECI</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Bairro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($realStates as $realState)
            <tr>
                <td>{{ $realState->id }}</td>
                <td>{{ $realState->company }}</td>
                <td>{{ $realState->trading_name }}</td>
                <td>{{ $realState->cnpj }}</td>
                <td>{{ $realState->creci }}</td>
                <td>{{ $realState->address->cep }}</td>
                <td>{{ $realState->address->street }}</td>
                <td>{{ $realState->address->district }}</td>
                <td><a class="btn btn-info" href="{{ action('RealStatesController@edit', $realState->id) }}">Editar</a></td>
                <td>
                    <form action="{{ action('RealStatesController@destroy', $realState) }}" method="POST">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection