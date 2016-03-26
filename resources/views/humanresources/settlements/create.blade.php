@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Finiquito</h3>

{!! Form::open(['action' => 'HumanResources\SettlementController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.settlements.form')

{!! Form::close() !!}

@endsection