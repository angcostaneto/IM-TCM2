@extends('layouts.app')

@section('content')

<div class="row wow fadeIn">
    <div class="col-md-12 mb-6">
        <div class="card">
            <div class="card-header text-center">
                {{$residencia->header_anuncio}}
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Valor:&nbsp;</strong>R${{$residencia->preco}}
                    </li>
                    <li class="list-group-item">
                      <strong>Área:&nbsp;</strong>{{$residencia->area}} m²
                    </li>
                    <li class="list-group-item">
                      <strong>Quartos:&nbsp;</strong>{{$residencia->quartos}}
                    </li>
                    <li class="list-group-item">
                      <strong>Banheiros:&nbsp;</strong>{{$residencia->banheiros}}
                    </li>
                    <li class="list-group-item">
                      <strong>&nbsp;Suites:&nbsp;</strong>{{$residencia->suites}}
                    </li>
                    <li class="list-group-item">
                      <strong>&nbsp;Vagas na garagem:&nbsp;</strong>{{$residencia->garagens}}
                    </li>
                    <li class="list-group-item">
                      <strong>Endereço:&nbsp;</strong>
                        {{ $residencia->endereco->rua }}, {{ $residencia->endereco->numero }}, 
                        {{ $residencia->endereco->bairro }}, {{ $residencia->endereco->cidade }}.
                    </li>
                </ul>
            </div>    
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/avaliacaoBairro.js') }}"></script>
    <script src="{{ asset('js/geosearch.js') }}"></script>
@endpush

@endsection