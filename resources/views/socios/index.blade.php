@extends('layouts/app')

@section('content')
    <h4>
        <span class="glyphicon glyphicon-sort-by-alphabet"></span> Sócios
    </h4>

    <hr>

    {!! link_to('socios/create', 'Novo', ['class' => 'btn btn-primary navbar-left']) !!}

    <table class="table table table-striped table-hover">
        <thead>
            <th>ID:</th>
            <th>Clube:</th>
            <th>Nome Completo:</th>
            <th>Ações:</th>
            <th colspan="2"></th>
        </thead>

        <tbody>
            @foreach($socios as $socio)
                <tr>
                    <td>{!! $socio->id !!}</td>
                    <td>{!! $socio->nome !!}</td>
                    <td>{!! $socio->nomeCompleto !!}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['socios.destroy', $socio->id]]) !!}
                            <button type="submit" class="btn btn-danger">
                                Excluir
                            </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @unless(count($socios))
        <p class="text-center">Não existem Sócios cadastrados!</p>
    @endunless
@stop