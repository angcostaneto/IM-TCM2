<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cep" id="cep" placeholder="CEP" value="{{$user->endereco->cep or old('cep')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="number" name="numero" id="numero" placeholder="Número" value="{{$user->endereco->numero or old('numero')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rua</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="logradouro" id="logradouro" readonly placeholder="Rua" value="{{$user->endereco->rua or old('rua')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="bairro" id="bairro" readonly placeholder="Bairro" value="{{$user->endereco->bairro or old('bairro')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cidade" id="cidade" readonly placeholder="Cidade" value="{{$user->endereco->cidade or old('cidade')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="estado" id="estado" readonly placeholder="Estado" value="{{$user->endereco->estado or old('estado')}}">
    </div>
</div>

<script src="{{ asset('js/cep.js') }}"></script>