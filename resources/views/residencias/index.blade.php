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
                    Residências
                    <span class="float-right">
                        <a href="{{ route('residencias.create') }}">
                            <i class="fa fa-plus mr-3"></i>
                        </a>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="blue lighten-4">
                            <tr>
                                <th scope="row">Codigo</th>
                                <th scope="row">Titulo</th>
                                <th scope="row">Negociação</th>
                                <th scope="row">Descrição</th>
                                <th scope="row">Tipo</th>
                                <th scope="row">Preço</th>
                                <th scope="row">Quartos</th>
                                <th scope="row">Toilet</th>
                                <th scope="row">Banheiro</th>
                                <th scope="row">Suite</th>
                                <th scope="row">Garagem</th>
                                <th scope="row">Área (m²)</th>
                                <th scope="row">Cidade / CEP</th>
                                <th scope="row">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($residencias)>0)
                            
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
                                            <a class="btn btn-info" href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-success" href="{{ action('ResidenciasController@show', $residencia) }}" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
                                            <form action="{{ action('ResidenciasController@destroy', $residencia) }}" method="POST">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Deletar"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection