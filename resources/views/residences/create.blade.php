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
<form method="post" action="{{url('residences')}}">
    <label>title</label>
    <input type="text" name="title">
    <label>residence type</label>
    <select name="residences_type">
        <option>Selecione um tipo</option>
        @foreach ($residencesTypes as $key => $residencesType)
            <optgroup label="{{$key}}">
                @foreach ($residencesType as $rT)
                    <option value="{{$rT['id']}}">{{$rT['name']}}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    <label>description</label>
    <input type="text" name="description">
    <label>negotiation_price</label>
    <input type="text" name="negotiation_price">
    <label>toilet</label>
    <input type="number" name="toilet">
    <label>bathroom</label>
    <input type="number" name="bathroom">
    <label>suite</label>
    <input type="number" name="suite">
    <label>garage</label>
    <input type="number" name="garage">
    <label>area</label>
    <input type="number" name="area" step="0.01">
    <label>cep</label>
    <input type="text" name="cep">
    <label>numero</label>
    <input type="text" name="number">
    <input type="submit" value="salvar">
    {{csrf_field()}}
</form>