@extends('layouts.app')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
         @endif
        <div class="x_panel">
            <div class="x_title">
                <h2>Residencias</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <tr>
                        <th>Codigo</th>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Preço</th>
                        <th>Quartos</th>
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
                        <td>{{ $residence->bedroom }}</td>
                        <td>{{ $residence->toilet }}</td>
                        <td>{{ $residence->bathroom }}</td>
                        <td>{{ $residence->suite }}</td>
                        <td>{{ $residence->garage }}</td>
                        <td>{{ $residence->area }}</td>
                        <td>{{ $residence->address->cep }}</td>
                        <td>{{ $residence->address->street }}</td>
                        <td>{{ $residence->address->district }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ action('ResidencesController@edit', $residence->id) }}">Editar</a>
                            <form action="{{ action('ResidencesController@destroy', $residence) }}" method="POST">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection