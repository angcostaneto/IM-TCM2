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
<form method="post" action="{{ url('realstates') }}">
    <label>company</label>
    <input type="text" name="company" value="{{ $realStates->company }}">
    <label>trading_name</label>
    <input type="text" name="trading_name">
    <label>logo</label>
    <input type="text" name="logo">
    <label>cnpj</label>
    <input type="text" name="cnpj">
    <label>creci</label>
    <input type="text" name="creci">
    <label>phones</label>
    <input type="text" name="phones">
    <label>responsable</label>
    <input type="text" name="responsable">
    <label>responsable_email</label>
    <input type="text" name="responsable_email">
    <label>cep</label>
    <input type="text" name="cep">
    <label>numero</label>
    <input type="text" name="number">
<input type="submit" value="salvar">
{{csrf_field()}}
</form>