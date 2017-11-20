<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cep" id="cep" placeholder="CEP" value="{{ !empty($address) ? $address->cep : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="number" id="number" placeholder="Número" value="{{ !empty($address) ? $address->number : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rua</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="number" id="street" readonly placeholder="Rua" value="{{ !empty($address) ? $address->street : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="number" id="district" readonly placeholder="Bairro" value="{{ !empty($address) ? $address->district : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="number" id="city" readonly placeholder="Cidade" value="{{ !empty($address) ? $address->city : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="number" id="state" readonly placeholder="Estado" value="{{ !empty($address) ? $address->state : '' }}">
    </div>
</div>

<script src="{{ asset('js/cep.js') }}"></script>