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
                <h2>Imobiliaria</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
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
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade/Estado</th>
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
                            <td>{{ $realState->address->number }}</td>
                            <td>{{ $realState->address->district }}</td>
                            <td>{{ $realState->address->city }} - {{ $realState->address->state }}</td>
                            <td>
                                <div class="inline">
                                    <a class="btn btn-small btn-info" href="{{ action('RealStatesController@edit', $realState->id) }}">Editar</a>
                                    <form action="{{ action('RealStatesController@destroy', $realState) }}" method="POST">
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
            </div>
        </div>
    </div>
@endsection