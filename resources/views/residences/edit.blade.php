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
<form method="post" action="{{ action('ResidencesController@update', $residence->id) }}">
    <input name="_method" type="hidden" value="PATCH">
    <label>title</label>
    <input type="text" name="title" value="{{$residence->title}}">
    <label>residence type</label>
    <select name="residences_type">
        <option>Selecione um tipo</option>
        @foreach ($residencesTypes as $key => $residencesType)
            <optgroup label="{{$key}}">
                @foreach ($residencesType as $rT)
                    @if ($rT['id'] == $residence->type->id) {
                        <option value="{{$rT['id']}}" selected>{{$rT['name']}}</option>
                    @else
                        <option value="{{$rT['id']}}">{{$rT['name']}}</option>
                    @endif
                @endforeach
            </optgroup>
        @endforeach
    </select>
    <label>description</label>
    <input type="text" name="description" value="{{$residence->description}}">
    <label>negotiation_price</label>
    <input type="text" name="negotiation_price" value="{{$residence->negotiation_price}}">
    <label>toilet</label>
    <input type="number" name="toilet"  value="{{$residence->toilet}}">
    <label>bathroom</label>
    <input type="number" name="bathroom" value="{{$residence->bathroom}}">
    <label>suite</label>
    <input type="number" name="suite" value="{{$residence->suite}}">
    <label>garage</label>
    <input type="number" name="garage" value="{{$residence->garage}}">
    <label>area</label>
    <input type="number" name="area" step="0.01" value="{{$residence->area}}">
    <label>cep</label>
    <input type="text" name="cep" value="{{$residence->address->cep}}">
    <label>numero</label>
    <input type="text" name="number" value="{{$residence->address->number}}">
    <input type="submit" value="salvar">
    {{csrf_field()}}
</form>