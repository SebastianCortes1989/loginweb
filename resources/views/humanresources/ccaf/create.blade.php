@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Préstamo CCAF</h5>

{!! Form::open(['action' => 'HumanResources\CcafController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.ccaf.form')
	
{!! Form::close() !!}

@endsection