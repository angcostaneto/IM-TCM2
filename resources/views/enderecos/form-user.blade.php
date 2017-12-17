<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cep" id="cep" placeholder="CEP" value="{{$user->address->cep or old('cep')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="number" name="number" id="number" placeholder="Número" value="{{$user->address->number or old('number')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rua</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="street" id="street" readonly placeholder="Rua" value="{{$user->address->street or old('street')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="district" id="district" readonly placeholder="Bairro" value="{{$user->address->district or old('district')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="city" id="city" readonly placeholder="Cidade" value="{{$user->address->city or old('city')}}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="state" id="state" readonly placeholder="Estado" value="{{$user->address->state or old('state')}}">
    </div>
</div>

<script src="{{ asset('js/cep.js') }}"></script>