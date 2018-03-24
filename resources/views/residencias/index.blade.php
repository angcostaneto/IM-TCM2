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
                    <table class="table table-hover table-sm">
                        <thead class="blue lighten-4 text-center">
                            <tr>
                                <th scope="row">Codigo</th>
                                <th scope="row">Titulo</th>
                                <th scope="row">Negociação</th>
                                <th scope="row">Descrição</th>
                                <th scope="row">Tipo</th>
                                <th scope="row">Preço</th>
                                <th scope="row">Área (m²)</th>
                                <th scope="row">Cidade / CEP</th>
                                <th scope="row">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if(count($residencias)>0)
                            
                                @foreach ($residencias as $residencia)
                                <tr>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->codigo }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->header_anuncio }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->tipo_negociacao }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->descricao }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->tipo->nome }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->preco }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->area }}</a></td>
                                    <td><a href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar">{{ $residencia->endereco->cidade }} - {{ $residencia->endereco->cep }}</a></td>
                                    <td>
                                        <div>
                                            <form action="{{ action('ResidenciasController@destroy', $residencia) }}" method="POST">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-outline-red btn-rounded btn-sm px-2" type="submit" title="Deletar"><i class="fa fa-trash mt-0"></i></button>
                                                <a class="btn btn-outline-green btn-rounded btn-sm px-2" href="{{ action('ResidenciasController@show', $residencia) }}" title="Visualizar"><i class="fa fa-eye mt-0"></i></a>
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