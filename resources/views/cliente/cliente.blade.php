@extends ('cliente.template')

@section('main')
    <div class="jumbotron">
        <div class="container">
            <div class="row">

                @if($agent->isMobile())
                    <h2 class="text-center">Encontre aqui seu próximo imóvel.</h2>
                    <div class="row">
                        <form class="form-inline" action="/action_page.php">
                            <div class="btn-group special col-12">
                                <button class="btn btn-primary box-shadow" type="button">Comprar</button>
                                <button class="btn btn-success box-shadow" type="button">Alugar</button>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control form-home box-shadow" placeholder="Cidade, bairro">
                            </div>
                            <div class="btn-group col-12">
                                <select name="tipo" class="form-control form-home box-shadow">
                                    <option selected>Tipo de imóvel</option>
                                    @if($tipos->count() > 0)
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
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
                        <form class="form-inline float-right" action="/action_page.php">
                            <div class="btn-group">
                                <button class="btn btn-primary box-shadow" type="button">Comprar</button>
                                <button class="btn btn-success box-shadow" type="button">Alugar</button>
                            </div>
                            <input type="text" class="form-control margin02 box-shadow" placeholder="Cidade, bairro">
                            <select name="tipo" class="form-control margin02 box-shadow">
                                <option selected>Tipo de imóvel</option>
                                @if($tipos->count() > 0)
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
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
            
        @if($residencias->count() > 0)
            
            @foreach($residencias as $residencia)

            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">

                <div class="card">
                    <a href="residencia/{{$residencia->id}}">
                        <img class="card-img-top img-thumbnail rounded" src="@if(!empty($residencia->imagem) && count(json_decode($residencia->imagem))>0){{json_decode($residencia->imagem)[0]->link}}@else http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg @endif" alt="Foto da residência">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$residencia->header_anuncio}} 
                            <span style="font-size:0.6em;" class="badge badge-success">{{$residencia->tipo->nome}}</span>
                            <span style="font-size:0.6em;" class="badge badge-primary">{{$residencia->tipo_negociacao}}</span>
                        </h5>
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
                                <strong>&nbsp;Garagem:&nbsp;</strong>{{$residencia->garagens}}
                            </li>
                            <li class="list-group-item"><strong>Endereço:&nbsp;</strong>
                                {{ $residencia->endereco->rua }}, {{ $residencia->endereco->numero }}, 
                                {{ $residencia->endereco->bairro }}, {{ $residencia->endereco->cidade }}.
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