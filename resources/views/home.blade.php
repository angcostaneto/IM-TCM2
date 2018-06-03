@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                                <th scope="col">Anúncio</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Visitas</th>
                                <th scope="col">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($residencias as $residencia)
                            <tr>
                                <td>
                                    @if (!empty($residencia->imagem))
                                        <img class="img-thumbnail rounded img-thumbnail mx-auto d-block" style="max-height:150px;" src="{{json_decode($residencia->imagem)[0]->link ?? null}}" alt="Foto da residência">
                                    @else  
                                        <img class="img-thumbnail rounded img-thumbnail mx-auto d-block" style="max-height:150px;" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="Foto da residência">
                                    @endif
                                </td>
                                <td>{{ $residencia->header_anuncio }}</td>
                                <td>R$ {{ $residencia->preco }}</td>
                                <td>{{ $residencia->visitas }}</td>
                                <td><a class="btn btn-success" href="{{ action('ResidenciasController@show', $residencia) }}" data-toggle="tooltip" title="Visualizar"><i class="fa fa-eye"></i></a></td>
                            </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                    {{ $residencias->links() }}
                    Você está acessando a área administrativa do Sistema de Administração de Imóveis!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
