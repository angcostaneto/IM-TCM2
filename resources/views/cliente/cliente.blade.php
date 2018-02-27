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
        <form action="{{action('ClienteController@procurar')}}" method="post">
            
            {{ csrf_field() }}
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            
            <div class="formzao mx-auto">
                
                <div class="tipoimo btn-group btn-group-justified">
                    <input type="button" value="Alugar" class="btn btn-danger tiponegocio">
                    <input type="button" value="Comprar" class="btn btn-success tiponegocio">
                    <input type="button" value="Vender" class="btn btn-info tiponegocio">
                    <input type="hidden" value="" id="tiponegocio" name="tiponegocio">
                </div>

                <div class="tipo">
                    <select name="tipoimovel" class="form-control">
                        <option value="">Qual tipo de imóvel</option>
                        <option value="Casa de Vila">Casa de Vila</option>
                        <option value="Casa de Condomínio">Casa de Condomínio</option>
                        <option value="Apartamento Padrão">Apartamento Padrão</option>
                        <option value="Cobertura">Cobertura</option>
                        <option value="Kitnet">Kitnet</option>
                        <option value="Chácara">Chácara</option>
                        <option value="Fazenda">Fazenda</option>
                        <option value="Sitio">Sitio</option>
                    </select>
                </div>

                <div class="cidade">
                    <input type="text" name="cidade" class="form-control" maxlength="30" placeholder="Cidade...">
                </div>
                
                <div class="procurar">
                    <button type="submit" style="cursor: pointer;" class="btn btn-primary">Procurar</button>
                </div>
                
            </div>
        </form>

    </section>

    <div class="album text-muted">
      <div class="container">

        <div class="row">
            
            @if($residencias->count() > 0)
            
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
    @else
        <h1>Nenhum resultado encontrado.</h1>
        </div>
    @endif
    
@stop