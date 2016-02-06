@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Anticipo</h5>

{!! Form::open(['action' => 'HumanResources\AdvanceController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('advance_id', $advance->id) !!}

	@include('humanresources.advances.form')

{!! Form::close() !!}

@endsection