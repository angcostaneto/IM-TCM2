@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Painel</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Anúncio</th>
                                <th scope="col">Negociação</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Visitas</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        @if(isset($residencias) && count($residencias)>0)
                            @foreach ($residencias as $residencia)
                                <tbody>
                                    <tr>
                                        <td>
                                            @if (!empty($residencia->imagem))
                                                <img class="img-thumbnail rounded img-thumbnail mx-auto d-block" style="max-width:120px;max-height:120px;" src="{{json_decode($residencia->imagem)[0]->link ?? null}}" alt="Foto da residência">
                                            @else  
                                                <img class="img-thumbnail rounded img-thumbnail mx-auto d-block" style="max-width:120px;max-height:120px;" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="Foto da residência">
                                            @endif
                                        </td>
                                        <td>{{ $residencia->codigo }}</td>
                                        <td>{{ $residencia->header_anuncio }}</td>
                                        <td>{{ $residencia->tipo_negociacao }}</td>
                                        <td>R$ {{ $residencia->preco }}</td>
                                        <td>{{ $residencia->visitas }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ action('ResidenciasController@show', $residencia) }}" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-info" href="{{ action('ResidenciasController@edit', $residencia) }}" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
                                            <form action="{{ action('ResidenciasController@destroy', $residencia) }}" method="POST" style="display: inline;">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger inline" type="submit" daadicionar um orderta-toggle="tooltip" title="Deletar"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        @else
                            <p>Nenhum anúncio cadastrado.</p>
                        @endif
                         
                    </table>
                    {{ $residencias->links() }}
                    Você está acessando a área administrativa do Sistema de Administração de Imóveis!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
