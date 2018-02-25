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
                <h2>Residencias</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Titulo</th>
                            <th>Negociação</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Preço</th>
                            <th>Quartos</th>
                            <th>Toilet</th>
                            <th>Banheiro</th>
                            <th>Suite</th>
                            <th>Garagem</th>
                            <th>Área (m²)</th>
                            <th>Cidade / CEP</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residencias as $residencia)
                        <tr>
                            <td>{{ $residencia->codigo }}</td>
                            <td>{{ $residencia->header_anuncio }}</td>
                            <td>{{ $residencia->tipo_negociacao }}</td>
                            <td>{{ $residencia->descricao }}</td>
                            <td>{{ $residencia->tipo->nome }}</td>
                            <td>{{ $residencia->preco }}</td>
                            <td>{{ $residencia->quartos }}</td>
                            <td>{{ $residencia->toilets }}</td>
                            <td>{{ $residencia->banheiros }}</td>
                            <td>{{ $residencia->suites }}</td>
                            <td>{{ $residencia->garagens }}</td>
                            <td>{{ $residencia->area }}</td>
                            <td>{{ $residencia->endereco->cidade }} - {{ $residencia->endereco->cep }}</td>
                            <td>
                                <div class="inline">
                                    <a class="btn btn-info" href="{{ action('ResidenciasController@edit', $residencia->id) }}">Editar</a>
                                    <form action="{{ action('ResidenciasController@destroy', $residencia) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Deletar</button>
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