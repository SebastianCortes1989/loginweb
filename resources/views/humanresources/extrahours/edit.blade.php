@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Hora Extra</h3>

{!! Form::open(['action' => 'HumanResources\ExtraHourController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('extra_hour_id', $extraHour->id) !!}

	@include('humanresources.extrahours.form')

{!! Form::close() !!}

@endsection