@extends ('client.template')

@section('title', 'Apperitivo')

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
            
            @foreach($residences as $residence)
            <div class="col-md-4">
                <div id="residences">
                    <img class="foto-imovel" alt="Foto da residência" src="{{$residence->image}}">
                    <h3 class="card-title">{{$residence->title}}</h3>
                    <span class="badge badge-success">{{$residence->type->residences_types_category}}</span>
                    <p class="card-text">{{$residence->description}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Valor:&nbsp;</strong>R${{$residence->negotiation_price}}</li>
                        <li class="list-group-item small text-left">
                            <strong>Área:&nbsp;</strong>{{$residence->area}} m² | 
                            <strong>&nbsp;Quartos:&nbsp;</strong>{{$residence->bathroom}} | 
                            <strong>&nbsp;Banheiros:&nbsp;</strong>{{$residence->toilet}} | 
                            <strong>&nbsp;Suites:&nbsp;</strong>
                                @if(!empty($residence->suites))
                                    {{$residence->suites}}
                                @else 
                                    0
                                @endif | 
                            <strong>&nbsp;Vagas na garagem:&nbsp;</strong>{{$residence->garage}}
                        </li>
                        <li class="list-group-item"><strong>Endereço:&nbsp;</strong>
                            {{ $residence->address->street }}, {{ $residence->address->number }}, 
                            {{ $residence->address->district }}, {{ $residence->address->city }}.
                        </li>
                    </ul>
                    <a href="#" class="btninfo btn btn-primary">Mais informações</a>
                </div>
            </div>
            @endforeach
            
        </div>
    {!! $residences->links() !!}
@stop