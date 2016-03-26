@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Carta de Aviso</h3>

{!! Form::open(['action' => 'HumanResources\LetterController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.letters.form')
	
{!! Form::close() !!}

@endsection