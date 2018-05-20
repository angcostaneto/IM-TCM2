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
            <h2>Mensagens Recebidas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Residencia</th>
                            <th>Remetente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mensagens as $mensagem)
                            <tr>
                                <td>{{ $mensagem['residencia']->codigo }}</td>
                                <td>{{ $mensagem['remetente']->name }}</td>
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ route('conversa', [$mensagem['conversa']]) }}">
                                        <span class="fa fa-eye"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection