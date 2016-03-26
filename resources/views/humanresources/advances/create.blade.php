@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Anticipo</h3>

{!! Form::open(['action' => 'HumanResources\AdvanceController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.advances.form')

{!! Form::close() !!}

@endsection