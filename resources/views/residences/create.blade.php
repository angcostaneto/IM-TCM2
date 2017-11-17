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
    <form method="post" class="form-horizontal form-label-left" action="{{url('residences')}}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="title">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo da residencia</label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12" name="residences_type">
                    <option>Selecione um tipo</option>
                    @foreach ($residencesTypes as $key => $residencesType)
                        <optgroup label="{{$key}}">
                            @foreach ($residencesType as $rT)
                                <option value="{{$rT['id']}}">{{$rT['name']}}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="description">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="negotiation_price">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Toilet</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="number" name="toilet">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Banheiros</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="number" name="bathroom">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Suites</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="number" name="suite">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Garagem</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="number" name="garage">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Área</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="number" name="area" step="0.01">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="cep">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="number">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </div>
        
        {{csrf_field()}}
    </form>
@endsection