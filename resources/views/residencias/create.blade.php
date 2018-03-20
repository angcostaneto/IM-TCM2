@extends('layouts.app')

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
    <div class="row wow fadeIn">
        <div class="col-md-6 mb-4">
            <form method="post" enctype="multipart/form-data" action="{{url('residencias')}}">
            <!-- Card -->
            <div class="card">
                
                <div class="card-header text-center">
                    Cadastrar Residência
                </div>
                <!-- Card body -->
                <div class="card-body">
                
                    <!-- Material form register -->
                        <div class="md-form">
                            <input id="header_anuncio" class="form-control" type="text" name="header_anuncio" value="{{old('header_anuncio')}}" required>
                            <label for="header_anuncio" class="font-weight-light">Titulo do anúncio</label>
                        </div>

                        <div class="md-form">
                            
                            <select class="select" name="tipo_residencia">
                                 <option disabled selected>Selecione um tipo</option>
                                    @foreach ($tipoResidencias as $key => $tipoResidencia)
                                        <optgroup label="{{$key}}">
                                            @foreach ($tipoResidencia as $rT)
                                                <option value="{{$rT['id']}}" @if(old('tipo_residencia')==$rT['id']) selected @endif>{{$rT['nome']}}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                            </select>
                            <label>Tipo da Residência</label>
            
                        </div>

                        <div class="md-form">
                            <textarea id="descricao" class="form-control md-textarea" type="text" name="descricao" length="120" rows="3" value="{{old('descricao')}}"></textarea>
                            <label for="descricao" class="font-weight-light">Descrição</label>
                        </div>

                        <div class="md-form">
                            <select class="select" name="tipo_negociacao">
                                <option disabled selected>Selecione um tipo</option>
                                <option value="Alugar" @if(old('tipo_negociacao')=="Alugar") selected @endif>Alugar</option>
                                <option value="Vender" @if(old('tipo_negociacao')=="Vender") selected @endif>Vender</option>
                            </select>
                            <label>Negociação</label>
                        </div>

                        <div class="md-form">
                            <input id="preco" class="form-control money" type="text" name="preco" value="{{old('preco')}}" required>
                            <label for="preco" class="font-weight-light">Preço</label>
                        </div>

                        <div class="md-form">
                            <input id="quartos" class="form-control" type="text" name="quartos" value="{{old('quartos')}}" required>
                            <label for="quartos" class="font-weight-light">Quartos</label>
                        </div>

                        <div class="md-form">
                            <input id="toilets" class="form-control" type="text" name="toilets" value="{{old('toilets')}}" required>
                            <label for="toilets" class="font-weight-light">Toilets</label>
                        </div>

                        <div class="md-form">
                            <input id="banheiros" class="form-control" type="text" name="banheiros" value="{{old('banheiros')}}" required>
                            <label for="banheiros" class="font-weight-light">Banheiros</label>
                        </div>

                        <div class="md-form">
                            <input id="suites" class="form-control" type="text" name="suites" value="{{old('suites')}}" required>
                            <label for="suites" class="font-weight-light">Suites</label>
                        </div>

                        <div class="md-form">
                            <input id="garagens" class="form-control" type="text" name="garagens" value="{{old('garagens')}}" required>
                            <label for="garagens" class="font-weight-light">Garagem</label>
                        </div>

                        <div class="md-form">
                            <input id="area" class="form-control area" type="text" name="area" value="{{old('area')}}" required>
                            <label for="area" class="font-weight-light">Área (m²)</label>
                        </div>

                        <div class="md-form">
                            <label class="font-weight-light">Extras</label>
                            <br><br>
                            <div class="form-check">
                                <input type="checkbox" name="ar" value="1" id="ar">
                                <label class="form-check-label" for="ar">
                                    Ar condicionado
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="piscina" value="1" id="piscina">
                                <label class="form-check-label" for="piscina">
                                    Piscina
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="churrasqueira" value="1" id="churrasqueira">
                                <label class="form-check-label" for="churrasqueira">
                                    Churrasqueira
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="closet" value="1" id="closet">
                                <label class="form-check-label" for="closet">
                                    Closet
                                </label>
                            </div>
                            <div class="md-form">
                                <input id="outros" class="form-control area" type="text" name="outros" value="{{old('outros')}}" required>
                                <label for="outros" class="font-weight-light">Outros</label>
                            </div>
                        </div>

                        <div class="md-form">
                            <label for="outros" class="font-weight-light">Imagens</label>
                            <br><br>
                            <div class="file-field">
                                <div class="btn btn-primary btn-sm float-left">
                                    <span>Escolha suas Imgens</span>
                                    <input type="file" name="imagem[]" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Faça upload de 1 ou mais imgens" readonly>
                                </div>
                            </div>
                        </div>

                    <div class="text-center mt-4">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>

                    <!-- Material form register -->
                
                </div>
                <!-- Card body -->
            
            </div>
            <!-- Card -->
            
        </div>
        <!-- Endereço -->
        @include('enderecos.form')
        <!-- Endereço -->
        
        {{csrf_field()}}
        </form>
        <!-- Mapa -->
        @include('mapa.mapa')
        <!-- Mapa -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $('.select').material_select();
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
        $('.area').mask('000.000.000.000.000,00', {reverse: true});
    </script>
@endpush