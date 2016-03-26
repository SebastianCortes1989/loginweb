@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Anticipo</h3>

{!! Form::open(['action' => 'HumanResources\AdvanceController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('advance_id', $advance->id) !!}

	@include('humanresources.advances.form')

{!! Form::close() !!}

@endsection