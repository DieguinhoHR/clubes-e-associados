@extends('layouts/app')

@section('content')
    <h4>
        <span class="glyphicon glyphicon-floppy-open"></span> Salvar Clube

        <a href="{{ URL::to('clubes') }}" class="btn btn-info navbar-right">
            <span class="glyphicon glyphicon-chevron-left"></span> Voltar
        </a>
    </h4>

    @include('errors.errors')

    {!! Form::open(['url' => 'clubes',
        'class' => 'form-horizontal row']) !!}

       <div class="col-lg-4">
           {!! Form::label('nome', 'Nome do Clube') !!}
           {!! Form::text('nome', null, ['class' => 'form-control',
           'placeholder' => 'Digite seu Nome']) !!}
        </div>

        <div class="col-lg-12">
            <br />
            {{ Form::submit('Salvar', ['class' => 'btn btn-primary']) }}
        </div>

    {!! Form::close() !!}
@endsection