@extends('default')

@section('content')

@include('humanresources.menu')

<h3 class="text-center">Registrar Ahorro APV</h3>

{!! Form::open(['action' => 'HumanResources\ApvController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}
	
  @include('humanresources.apv.form')

{!! Form::close() !!}

@endsection