
<table>
    <tr>
        <th>Id</th>
        <th>Razão Social</th>
        <th>Nome Fantasia</th>
        <th>CNPJ</th>
        <th>CRECI</th>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Bairro</th>
        <th>Ações</th>
    </tr>

    @foreach ($realStates as $realState)
    <tr>
        <td>{{ $realState->id }}</td>
        <td>{{ $realState->company }}</td>
        <td>{{ $realState->trading_name }}</td>
        <td>{{ $realState->cnpj }}</td>
        <td>{{ $realState->creci }}</td>
        <td>{{ $realState->address->cep }}</td>
        <td>{{ $realState->address->street }}</td>
        <td>{{ $realState->address->district }}</td>
        <td><a href="{{ action('RealStatesController@edit', $realState) }}">Edit</a></td>
        <td>
            <form action="{{ action('RealStatesController@destroy', $realState) }}" method="POST">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>