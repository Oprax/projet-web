@extends('layouts/app')

@section('content')
    {!! Form::open(['url' => '/shop/add-product']) !!}
    {!! Form::label('nom', 'Entrez votre nom : ') !!}
    {!! Form::text('nom') !!}
    {!! Form::submit('Envoyer !') !!}
    {!! Form::close() !!}
@endsection