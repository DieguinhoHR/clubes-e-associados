@extends('layouts/app')

@section('content')
    <h4>
        <span class="glyphicon glyphicon-sort-by-alphabet"></span> Clubes
    </h4>

    <hr>

    {!! link_to('clubes/create', 'Novo', ['class' => 'btn btn-primary navbar-left']) !!}

    <table class="table table table-striped table-hover">
        <thead>
            <th>ID:</th>
            <th>Nome do Clube:</th>
            <th>Ações:</th>
            <th colspan="2"></th>
        </thead>

        <tbody>
        @foreach($clubes as $clube)
            <tr>
                <td>{!! $clube->id !!}</td>
                <td>{!! $clube->nome !!}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['clubes.destroy', $clube->id]]) !!}
                        <button type="submit" class="btn btn-danger">
                            Excluir
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @unless(count($clubes))
        <p class="text-center">Não existem Clubes cadastrados!</p>
    @endunless
@stop