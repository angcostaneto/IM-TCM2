@extends('layouts.app')

@section('content')

    @foreach($residencias as $residencia)
        <div class="col-md-4">
            <div id="residences">
                <img class="foto-imovel" alt="Foto da residência" src="{{$residencia->imagem}}">
                <h3 class="card-title">{{$residencia->header_anuncio}}</h3>
                <span class="badge badge-success">{{$residencia->tipo->nome}}</span>
                <p class="card-text">{{$residencia->descricao}}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Valor:&nbsp;</strong>R${{$residencia->preco}}</li>
                    <li class="list-group-item small text-left">
                        <strong>Área:&nbsp;</strong>{{$residencia->area}} m² | 
                        <strong>&nbsp;Quartos:&nbsp;</strong>{{$residencia->quartos}} | 
                        <strong>&nbsp;Banheiros:&nbsp;</strong>{{$residencia->banheiros}} | 
                        <strong>&nbsp;Suites:&nbsp;</strong>
                            @if(!empty($residencia->suites))
                                {{$residencia->suites}}
                            @else 
                                0
                            @endif | 
                        <strong>&nbsp;Vagas na garagem:&nbsp;</strong>{{$residencia->garagens}}
                    </li>
                    <li class="list-group-item"><strong>Endereço:&nbsp;</strong>
                        {{ $residencia->endereco->rua }}, {{ $residencia->endereco->numero }}, 
                        {{ $residencia->endereco->bairro }}, {{ $residencia->endereco->cidade }}.
                    </li>
                </ul>
                <a href="#" class="btninfo btn btn-primary">Mais informações</a>
            </div>
        </div>
    @endforeach    
    
    {!! $residencias->links() !!}
@endsection