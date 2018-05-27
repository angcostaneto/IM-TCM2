@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/preview.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
     @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="col-md-12 col-sm-12 col-xs-12">
        <form method="post" enctype="multipart/form-data" action="{{ action('ResidenciasController@update', $residencia->id) }}">
            <input name="_method" type="hidden" value="PATCH">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Residência
                            <small>Editar a residência</small>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="header_anuncio" value="{{$residencia->header_anuncio}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo da residencia</label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="tipo_residencia">
                                    <option>Selecione um tipo</option>
                                    @foreach ($tipoResidencias as $key => $tipoResidencia)
                                        <optgroup label="{{$key}}">
                                            @foreach ($tipoResidencia as $rT)
                                                @if ($rT['id'] == $residencia->tipo->id) {
                                                    <option value="{{$rT['id']}}" selected>{{$rT['nome']}}</option>
                                                @else
                                                    <option value="{{$rT['id']}}">{{$rT['nome']}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Negociação</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" name="tipo_negociacao">
                                    <option>Selecione um tipo</option>
                                    <option value="Alugar" @if($residencia->tipo_negociacao=="Alugar") selected @endif>Alugar</option>
                                    <option value="Vender" @if($residencia->tipo_negociacao=="Vender") selected @endif>Vender</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="descricao" value="{{$residencia->descricao}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" id="preco" name="preco" value="{{$residencia->preco}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Quartos</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="quartos" value="{{$residencia->quartos}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Toilet</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="toilets" value="{{$residencia->toilets}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Banheiros</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="banheiros" value="{{$residencia->banheiros}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Suites</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="suites" value="{{$residencia->suites}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Garagem</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="garagens" value="{{$residencia->garagens}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Área</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="number" name="area" step="0.01" value="{{$residencia->area}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Extras</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="checkbox" name="ar" value="1" @if($residencia->ar)checked @endif> Ar condicionado<br>
                                <input type="checkbox" name="piscina" value="1" @if($residencia->piscina)checked @endif> Piscina<br>
                                <input type="checkbox" name="churrasqueira" value="1" @if($residencia->churrasqueira)checked @endif> Churrasqueira<br>
                                <input type="checkbox" name="closet" value="1" @if($residencia->closet)checked @endif> Closet<br>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Outros</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="text" name="outros" value="{{$residencia->outros}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotos</label>
                            </br>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12" type="file" name="imagens[]" id="imagens-update" multiple>
                                <button type="button" class="btn btn-danger form-inline" id="limpar">Limpar</button>
                            </div>
                            <br/><br/>
                            <div id="image_preview">
                                @if(!empty($residencia->imagem))
                                    @foreach( json_decode($residencia->imagem) as $imagem )
                                        <img class="img-thumbnail rounded" src="{{$imagem->link}}">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Endereço</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content form-horizontal form-label-left">
                        <br>
                        @include('enderecos.form', ['endereco' => $residencia->endereco])
                    </div>
                </div>{{-- 
                <span id="endereco" hidden>
                    {{ $residencia->endereco->rua }}, {{ $residencia->endereco->numero }}, 
                    {{ $residencia->endereco->bairro }}, {{ $residencia->endereco->cidade }}
                </span> --}}
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mapa</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content form-horizontal form-label-left">
                        <br>
                        @include('mapa.mapa')
                    </div>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>
            
        {{csrf_field()}}
        </form>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('plugins/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mask/priceMask.js') }}"></script>
    <script src="{{ asset('js/preview.js') }}"></script>
    <script src="{{ asset('js/cep.js') }}"></script>
    <script src="{{ asset('js/geosearch.js') }}"></script>
@endsection