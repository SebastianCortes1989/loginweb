@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Comisión</h5>

{!! Form::open(['action' => 'HumanResources\CommissionController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('commission_id', $commission->id) !!}

	@include('humanresources.commissions.form')

{!! Form::close() !!}

@endsection