@extends('default')

@section('content')

@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Ahorro APV</h5>

{!! Form::open(['action' => 'HumanResources\ApvController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}
	
  @include('humanresources.apv.form')

{!! Form::close() !!}

@endsection