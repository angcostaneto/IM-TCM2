@extends ('cliente.template')

@section('main')
    <div class="jumbotron">
        <div class="container">
            <div class="row">

                @if($agent->isMobile())
                    <h2 class="text-center">Encontre aqui seu próximo imóvel.</h2>
                    <div class="row">
                        <form class="form-inline" method="POST" action="/procurar">
                            {{ csrf_field() }}
                            <div class="btn-group special col-12" @if($errors->has('tiponegocio')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                                <button class="btn btn-primary box-shadow tiponegocio" type="button">Comprar</button>
                                <button class="btn btn-success box-shadow tiponegocio" type="button">Alugar</button>
                                <input type="hidden" name="tiponegocio" id="tiponegocio" value="@if(isset($tiponegocio)){{$tiponegocio}}@endif">
                            </div>
                            <div class="col-12">
                                <input type="text" name="cidade" class="form-control form-home box-shadow" value="@if(isset($cidade)){{$cidade}}@endif" placeholder="Cidade" @if($errors->has('cidade')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                            </div>
                            <div class="btn-group col-12">
                                <select name="tipoimovel" class="form-control form-home box-shadow" @if($errors->has('tipoimovel')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                                    <option value="" selected>Tipo de imóvel</option>
                                    @if($tipos->count() > 0)
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->nome}}" @if(isset($tipoimovel) && $tipoimovel==$tipo->nome) selected @endif>{{$tipo->nome}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button type="submit" class="btn btn-primary box-shadow margin02"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <img src="\img\home.png" class="img-fluid" alt="home">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <h2 class="text-right">Encontre aqui seu próximo imóvel.</h2>
                        <form class="form-inline float-right" method="POST" action="/procurar">
                            {{ csrf_field() }}
                            <div class="btn-group" @if($errors->has('tiponegocio')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                                <button class="btn btn-primary box-shadow tiponegocio" type="button">Comprar</button>
                                <button class="btn btn-success box-shadow tiponegocio" type="button">Alugar</button>
                                <input type="hidden" name="tiponegocio" id="tiponegocio" value="@if(isset($tiponegocio)){{$tiponegocio}}@endif">
                            </div>
                            <input type="text" name="cidade" class="form-control margin02 box-shadow" value="@if(isset($cidade)){{$cidade}}@endif" placeholder="Cidade" @if($errors->has('cidade')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                            <select name="tipoimovel" class="form-control margin02 box-shadow" @if($errors->has('tipoimovel')) style="border-color: #d9534f;border-style: solid;border-radius: 0.4em;" @endif>
                                <option value="" selected>Tipo de imóvel</option>
                                @if($tipos->count() > 0)
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->nome}}" @if(isset($tipoimovel) && $tipoimovel==$tipo->nome) selected @endif>{{$tipo->nome}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <button type="submit" class="btn btn-primary margin02 box-shadow"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>

                    </div>
                @endif

            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="row row-eq-height">
            
        @if(isset($residencias) && $residencias->count() > 0)
            
            @foreach($residencias as $residencia)

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                <div class="card">
                    <a href="residencia/{{$residencia->id}}">
                        @if (!empty($residencia->imagem))
                            <img class="card-img-top img-thumbnail rounded" src="{{json_decode($residencia->imagem)[0]->link ?? null}}" alt="Foto da residência">
                        @else  
                            <img class="card-img-top img-thumbnail rounded" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="Foto da residência">
                        @endif
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$residencia->header_anuncio ?? null}} 
                            <span style="font-size:0.6em;" class="badge badge-success">{{$residencia->tipo->nome ?? null}}</span>
                            <span style="font-size:0.6em;" class="badge badge-primary">{{$residencia->tipo_negociacao ?? null}}</span>
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Valor:&nbsp;</strong>R${{$residencia->preco ?? null}}</li>
                            <li class="list-group-item small text-left">
                                <strong>Área:&nbsp;</strong>{{$residencia->area ?? null}} m² | 
                                <strong>&nbsp;Quartos:&nbsp;</strong>{{$residencia->quartos ?? null}} | 
                                <strong>&nbsp;Banheiros:&nbsp;</strong>{{$residencia->banheiros ?? null}} | 
                                <strong>&nbsp;Suites:&nbsp;</strong>
                                    @if(!empty($residencia->suites))
                                        {{$residencia->suites ?? null}}
                                    @else 
                                        0
                                    @endif | 
                                <strong>&nbsp;Garagem:&nbsp;</strong>{{$residencia->garagens ?? null}}
                            </li>
                            <li class="list-group-item"><strong>Endereço:&nbsp;</strong>
                                {{ $residencia->endereco->rua ?? null }}, {{ $residencia->endereco->numero ?? null }}, 
                                {{ $residencia->endereco->bairro ?? null }}, {{ $residencia->endereco->cidade ?? null }}.
                            </li>
                        </ul>
                        <br/>
                        <a href="residencia/{{$residencia->id}}" class="btn btn-primary">Mais informações</a>
                    </div>
                </div>

            </div>
            @endforeach

        {!! $residencias->links() !!}
        @else
            <h1>Nenhum resultado encontrado.</h1>
        @endif
    </div>
    
@stop