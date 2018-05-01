@extends ('cliente.template')

@section('content')
<br/>
<div class="card">
    <div class="card-body">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                <div class="card bg-light">
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    
                            <ol class="carousel-indicators">
                            @if(!empty($residencia->imagem) && count(json_decode($residencia->imagem))>0)
                                @foreach( json_decode($residencia->imagem) as $imagem )
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @endif
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @if(!empty($residencia->imagem) && count(json_decode($residencia->imagem))>0)
                                    @foreach( json_decode($residencia->imagem) as $imagem )
                                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                            <img class="d-block img-fluid rounded" src="{{ $imagem->link }}" alt="">
                                        </div>
                                    @endforeach
                                @else
                                    <div class="carousel-item active">
                                        <img class="d-block img-fluid rounded" src="http://support.yumpu.com/en/wp-content/themes/qaengine/img/default-thumbnail.jpg" alt="">
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
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                <div class="card bg-light">
                    <div class="card-body">
                    
                        <p class="card-text"><strong>Nome do usuário</strong>
                        <br/>
                        (19) 99999-9999</p>
                        <hr/>
                        <h4>Entre em contato com o proprietário:</h4>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="seunome@email.com">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="(19) 99999-9999">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Sua mensagem"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>

                    </div>
                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <ul class="list-group list-group-flush detalhes-res">
                    <li class="list-group-item">
                        <span class="badge badge-success">{{$residencia->tipo->nome}}</span>
                        {{$residencia->header_anuncio}} 

                        @if($agent->isMobile()) <br/> @endif

                        <span class="@if(!$agent->isMobile()) float-right @endif">
                            <span class="badge badge-primary">{{$residencia->tipo_negociacao}}</span> 
                            <strong>Valor:&nbsp;</strong>R${{$residencia->preco}}
                        </span> 
                        
                    </li>
                    <li class="list-group-item">
                        <strong>Descrição:&nbsp;</strong>{{$residencia->descricao}}
                    </li>
                    <li class="list-group-item text-left">
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
                        @if(!empty($residencia->ar)) | Ar condicionado @endif
                        @if(!empty($residencia->piscina)) | Piscina @endif
                        @if(!empty($residencia->churrasqueira)) | Churrasqueira @endif
                        @if(!empty($residencia->closet)) | Closet @endif
                    </li>
                    @if(!empty($residencia->outros))
                        <li class="list-group-item">
                            <strong>Outros:&nbsp;</strong>{{$residencia->outros}}
                        </li>
                    @endif
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