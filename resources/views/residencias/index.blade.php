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
                        @if(count($residencias)>0)
                        
                            @foreach ($residencias as $residencia)
                            <tr>
                                <td>{{ $residencia->codigo }}</td>
                                <td>{{ $residencia->header_anuncio }}</td>
                                <td>{{ $residencia->tipo_negociacao }}</td>
                                <td>{{ $residencia->descricao }}</td>
                                <td>@if(!empty($residencia->tipo->nome)) {{ $residencia->tipo->nome }} @endif</td>
                                <td>{{ $residencia->preco }}</td>
                                <td>{{ $residencia->quartos }}</td>
                                <td>{{ $residencia->toilets }}</td>
                                <td>{{ $residencia->banheiros }}</td>
                                <td>{{ $residencia->suites }}</td>
                                <td>{{ $residencia->garagens }}</td>
                                <td>{{ $residencia->area }}</td>
                                <td>
                                    @if(!empty($residencia->endereco->cidade) && !empty($residencia->endereco->cep)) 
                                        {{ $residencia->endereco->cidade }} - {{ $residencia->endereco->cep }} 
                                    @endif
                                </td>
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
@endsection