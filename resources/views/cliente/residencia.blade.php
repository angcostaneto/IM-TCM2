@extends ('cliente.template')

@section('content')
<br/>
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center">{{$residencia->header_anuncio}} 
            <span style="font-size:0.6em;" class="badge badge-success">{{$residencia->tipo->nome}}</span>
        </h2>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
               
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                
                    <ol class="carousel-indicators">
                    @if(count(json_decode($residencia->imagem))>0)
                        @foreach( json_decode($residencia->imagem) as $imagem )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @endif
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @if(count(json_decode($residencia->imagem))>0)
                            @foreach( json_decode($residencia->imagem) as $imagem )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block img-fluid" src="../{{ $imagem }}" alt="">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    
                </div>


            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

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

            </div>

        </div>

        
    </div>
</div>
    
@stop