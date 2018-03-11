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
                <h2>Imobiliária</h2><br>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Razão Social</th>
                            <th>Nome Fantasia</th>
                            <th>CNPJ</th>
                            <th>CRECI</th>
                            <th>CEP</th>
                            <th>Logradouro</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Cidade/Estado</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($imobiliarias as $imobiliaria)
                        <tr>
                        <!--<td>{{ $imobiliaria->id }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->id }}</a></td>
                        <!--<td>{{ $imobiliaria->razao_social }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->razao_social }}</a></td>
                        <!--<td>{{ $imobiliaria->nome_fantasia }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->nome_fantasia }}</a></td>
                        <!--<td>{{ $imobiliaria->cnpj }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->cnpj }}</a></td>
                        <!--<td>{{ $imobiliaria->creci }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->creci }}</a></td>
                        <!--<td>{{ $imobiliaria->endereco->cep }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->endereco->cep }}</a></td>
                        <!--<td>{{ $imobiliaria->endereco->rua }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->endereco->rua }}</a></td>
                        <!--<td>{{ $imobiliaria->endereco->numero }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->endereco->numero }}</a></td>
                        <!--<td>{{ $imobiliaria->endereco->bairro }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->endereco->bairro }}</a></td>
                        <!--<td>{{ $imobiliaria->endereco->cidade }} - {{ $imobiliaria->endereco->estado }}</td>-->
                            <td><a href="/imobiliaria/{{ $imobiliaria->id }}/edit">{{ $imobiliaria->endereco->cidade }} - {{$imobiliaria->endereco->estado}}</a></td>
                            <td>
                                <div class="inline">
                                    <!--<a class="btn btn-small btn-info" href="{{ action('ImobiliariaController@edit', $imobiliaria->id) }}">Editar</a>-->
                                    <form action="{{ action('ImobiliariaController@destroy', $imobiliaria) }}" method="POST">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-small btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection