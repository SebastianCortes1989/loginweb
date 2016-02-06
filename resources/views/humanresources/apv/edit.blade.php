@extends('default')

@section('content')

@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Ahorro APV</h5>

{!! Form::open(['action' => 'HumanResources\ApvController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('saving_id', $saving->id) !!}
	
  @include('humanresources.apv.form')

{!! Form::close() !!}

@endsection