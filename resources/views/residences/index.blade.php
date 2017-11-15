<table>
    <tr>
        <th>Codigo</th>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Preço</th>
        <th>Toilet</th>
        <th>Banheiro</th>
        <th>Suite</th>
        <th>Garagem</th>
        <th>Área (m²)</th>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Bairro</th>
        <th>Ações</th>
    </tr>

    @foreach ($residences as $residence)
    <tr>
        <td>{{ $residence->code }}</td>
        <td>{{ $residence->title }}</td>
        <td>{{ $residence->description }}</td>
        <td>{{ $residence->type->name }}</td>
        <td>{{ $residence->negotiation_price }}</td>
        <td>{{ $residence->toilet }}</td>
        <td>{{ $residence->bathroom }}</td>
        <td>{{ $residence->suite }}</td>
        <td>{{ $residence->garage }}</td>
        <td>{{ $residence->ares }}</td>
        <td>{{ $residence->address->cep }}</td>
        <td>{{ $residence->address->street }}</td>
        <td>{{ $residence->address->district }}</td>
        <td></td>
        <td><a href="{{ action('ResidencesController@edit', $residence->id) }}">Edit</a></td>
        <td>
            <form action="{{ action('ResidencesController@destroy', $residence) }}" method="POST">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>