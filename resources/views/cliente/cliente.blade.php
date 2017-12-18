@extends ('cliente.template')

@section('titulo', 'Apperitivo')

@section('content')

      </div>
    </div>
    <div class="navbar navbar-inverse bg-inverse">
      <div class="container d-flex justify-content-between">
        <a href="#" class="navbar-brand"><img src="\img\logo-branco.png"></a>
        <div>
            <a href="{{url('home')}}" class="navbar-brand">
                <i class="ion-locked"></i>
            Login</a>
        </div>
      </div>
        
    </div>

    <section class="jumbotron text-center lightgreybg">

        <br/>
        <form action="/procurar" method="post">
            <div class="formzao mx-auto">
                
                <div class="tipoimo btn-group btn-group-justified">
                    <button type="button" class="btn btn-danger">Alugar</button>
                    <button type="button" class="btn btn-success">Comprar</button>
                    <button type="button" class="btn btn-info">Vender</button>
                </div>

                <div class="tipo">
                    <select name="tipo" class="form-control">
                        <option value="">Qual tipo de imóvel</option>
                        <option value="1">Apartamento</option>
                        <option value="2">Casa</option>
                        <option value="3">Comercial</option>
                    </select>
                </div>

                <div class="cidade">
                    <input type="text" name="cidade" class="form-control" placeholder="Cidade...">
                </div>
                
                <div class="procurar">
                    <a href="#" class="btn btn-primary">Procurar</a>
                </div>
                
            </div>
        </form>

    </section>

    <div class="album text-muted">
      <div class="container">

        <div class="row">
            
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
            
        </div>
    {!! $residencias->links() !!}
@stop