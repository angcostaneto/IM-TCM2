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
<form method="post" action="{{ action('RealStatesController@update', $realState->id) }}">
    <input name="_method" type="hidden" value="PATCH">
    <label>company</label>
    <input type="text" name="company" value="{{ $realState->company }}">
    <label>trading_name</label>
    <input type="text" name="trading_name" value="{{ $realState->trading_name }}" readonly>
    <label>logo</label>
    <input type="text" name="logo">
    <label>cnpj</label>
    <input type="text" name="cnpj" value="{{ $realState->cnpj }}" readonly>
    <label>creci</label>
    <input type="text" name="creci" value="{{ $realState->creci }}" readonly>
    <label>phones</label>
    <input type="text" name="phones" value="{{ $realState->company }}">
    <label>responsable</label>
    <input type="text" name="responsable" value="{{ $realState->phones }}">
    <label>responsable_email</label>
    <input type="text" name="responsable_email" value="{{ $realState->responsable_email }}">
    <label>cep</label>
    <input type="text" name="cep" value="{{ $realState->address->cep }}">
    <label>numero</label>
    <input type="text" name="number" value="{{ $realState->address->number }}">
<input type="submit" value="salvar">
{{csrf_field()}}
</form>