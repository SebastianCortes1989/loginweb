@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Hora Extra</h5>

{!! Form::open(['action' => 'HumanResources\ExtraHourController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.extrahours.form')

{!! Form::close() !!}

@endsection