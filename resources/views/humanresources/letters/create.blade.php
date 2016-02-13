@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Carta de Aviso</h5>

{!! Form::open(['action' => 'HumanResources\LetterController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.letters.form')
	
{!! Form::close() !!}

@endsection