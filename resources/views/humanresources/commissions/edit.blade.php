@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Comisión</h3>

{!! Form::open(['action' => 'HumanResources\CommissionController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('commission_id', $commission->id) !!}

	@include('humanresources.commissions.form')

{!! Form::close() !!}

@endsection