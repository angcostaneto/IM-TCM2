<div class="col-md-6 mb-4">
    <!-- Card -->
    <div class="card">
        
        <div class="card-header text-center">
            Endereço
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="md-form">
                 <input class="form-control" type="text" name="cep" id="cep" value="{{ !empty($endereco) ? $endereco->cep :  old('cep') }}">
                <label for="cep" class="font-weight-light">CEP</label>
            </div>
            <div class="md-form">
                <input class="form-control" type="text" name="numero" id="numero" value="{{ !empty($endereco) ? $endereco->numero : old('numero') }}">
                <label for="numero" class="font-weight-light">Número</label>
            </div>
            <div class="md-form">
                <input class="form-control" type="text" name="rua" readonly placeholder="Rua" id="rua" value="{{ !empty($endereco) ? $endereco->rua : old('rua') }}">
                <label for="cep" class="font-weight-light">Rua</label>
            </div>
            <div class="md-form">
                <input class="form-control" type="text" name="bairro" readonly placeholder="Bairro" id="bairro" value="{{ !empty($endereco) ? $endereco->bairro : old('bairro') }}">
                <label for="bairro" class="font-weight-light">Bairro</label>
            </div>
            <div class="md-form">
                <input class="form-control" type="text" name="cidade" readonly placeholder="Cidade" id="cidade" value="{{ !empty($endereco) ? $endereco->cidade : old('cidade') }}">
                <label for="cidade" class="font-weight-light">Cidade</label>
            </div>
            <div class="md-form">
                <input class="form-control" type="text" name="estado" readonly placeholder="Estado" id="estado" value="{{ !empty($endereco) ? $endereco->estado : old('estado') }}">
                <label for="estado" class="font-weight-light">Estado</label>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/cep.js') }}"></script>
@endpush