@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Carta de Aviso</h3>

{!! Form::open(['action' => 'HumanResources\LetterController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('letter_id', $letter->id) !!}

  @include('humanresources.letters.form')
	
{!! Form::close() !!}

@endsection