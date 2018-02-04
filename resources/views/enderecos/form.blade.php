<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">CEP</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cep" id="cep" placeholder="CEP" value="{{ !empty($endereco) ? $endereco->cep : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="numero" name="numero" id="number" placeholder="Número" value="{{ !empty($endereco) ? $endereco->numero : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rua</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="rua" id="rua" readonly placeholder="Rua" value="{{ !empty($endereco) ? $endereco->rua : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="bairro" id="bairro" readonly placeholder="Bairro" value="{{ !empty($endereco) ? $endereco->bairro : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cidade</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="cidade" id="cidade" readonly placeholder="Cidade" value="{{ !empty($endereco) ? $endereco->cidade : '' }}">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="form-control col-md-7 col-xs-12" type="text" name="estado" id="estado" readonly placeholder="Estado" value="{{ !empty($endereco) ? $endereco->estado : '' }}">
    </div>
</div>

@section('scripts')
    <script src="{{ asset('js/cep.js') }}"></script>
@endsection