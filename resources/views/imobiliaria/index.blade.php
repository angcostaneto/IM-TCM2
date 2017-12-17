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
                        @foreach ($imobiliarias as $imobiliaria)
                        <tr>
                            <td>{{ $imobiliaria->id }}</td>
                            <td>{{ $imobiliaria->company }}</td>
                            <td>{{ $imobiliaria->trading_name }}</td>
                            <td>{{ $imobiliaria->cnpj }}</td>
                            <td>{{ $imobiliaria->creci }}</td>
                            <td>{{ $imobiliaria->endereco->cep }}</td>
                            <td>{{ $imobiliaria->endereco->street }}</td>
                            <td>{{ $imobiliaria->endereco->number }}</td>
                            <td>{{ $imobiliaria->endereco->district }}</td>
                            <td>{{ $imobiliaria->endereco->city }} - {{ $imobiliaria->endereco->state }}</td>
                            <td>
                                <div class="inline">
                                    <a class="btn btn-small btn-info" href="{{ action('ImobiliariaController@edit', $imobiliaria->id) }}">Editar</a>
                                    <form action="{{ action('ImobiliariaController@destroy', $imobiliaria) }}" method="POST">
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