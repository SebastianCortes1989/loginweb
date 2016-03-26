@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Hora Extra</h3>

{!! Form::open(['action' => 'HumanResources\ExtraHourController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.extrahours.form')

{!! Form::close() !!}

@endsection