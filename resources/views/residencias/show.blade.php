@extends('layouts.app')

@section('content')

<div class="col-md-6">
    <div class="card">

        @if(!empty($residencia->imagem) && count(json_decode($residencia->imagem))>0)
            <img class="img-thumbnail rounded"  alt="Foto da residência" src="{{json_decode($residencia->imagem)[0]->link}}">
        @else  
            <img class="img-thumbnail rounded" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="Foto da residência">
        @endif

        <div class="card-body">
            <h3 class="card-title">{{$residencia->header_anuncio}}</h3>
            <span class="badge badge-success">{{$residencia->tipo->nome}}</span>
            <br>
            <h4 class="card-text">{{$residencia->descricao}}</h4>
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
                <li class="list-group-item"><strong>Endereço:&nbsp;</strong><span id="endereco">
                    {{ $residencia->endereco->rua }}, {{ $residencia->endereco->numero }}, 
                    {{ $residencia->endereco->bairro }}, {{ $residencia->endereco->cidade }}.</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Localização</h3>
            @include('mapa.mapa')
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/avaliacaoBairro.js') }}"></script>
    <script src="{{ asset('js/residencia.js') }}"></script>
@endpush

@endsection