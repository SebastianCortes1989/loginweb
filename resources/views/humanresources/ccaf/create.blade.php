@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Préstamo CCAF</h3>

{!! Form::open(['action' => 'HumanResources\CcafController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.ccaf.form')
	
{!! Form::close() !!}

@endsection