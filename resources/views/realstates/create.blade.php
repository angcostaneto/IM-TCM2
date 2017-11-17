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
    <form method="post" class="form-horizontal form-label-left" action="{{url('realstates')}}">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Razão Social</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="company">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Fantasia</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="trading_name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Logo da empresa</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="logo">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">CNPJ</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="cnpj">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">CRECI</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="creci">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefones</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="phones">
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Responsável</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="responsable">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email do Responsável</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input class="form-control col-md-7 col-xs-12" type="text" name="responsable_email">
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
            <   input class="form-control col-md-7 col-xs-12" type="text" name="number">
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