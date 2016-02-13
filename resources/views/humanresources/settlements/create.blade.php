@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Finiquito</h5>

{!! Form::open(['action' => 'HumanResources\SettlementController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.settlements.form')

{!! Form::close() !!}

@endsection