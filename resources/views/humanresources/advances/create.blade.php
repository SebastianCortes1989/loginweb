@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Anticipo</h5>

{!! Form::open(['action' => 'HumanResources\AdvanceController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.advances.form')

{!! Form::close() !!}

@endsection