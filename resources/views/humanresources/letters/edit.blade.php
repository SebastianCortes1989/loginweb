@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Carta de Aviso</h5>

{!! Form::open(['action' => 'HumanResources\LetterController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('letter_id', $letter->id) !!}

  @include('humanresources.letters.form')
	
{!! Form::close() !!}

@endsection