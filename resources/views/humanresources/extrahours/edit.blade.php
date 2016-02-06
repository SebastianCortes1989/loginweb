@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Hora Extra</h5>

{!! Form::open(['action' => 'HumanResources\ExtraHourController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('extra_hour_id', $extraHour->id) !!}

	@include('humanresources.extrahours.form')

{!! Form::close() !!}

@endsection