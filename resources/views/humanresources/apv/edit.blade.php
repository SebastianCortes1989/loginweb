@extends('default')

@section('content')

@include('humanresources.menu')

<h3 class="text-center">Editar Ahorro APV</h3>

{!! Form::open(['action' => 'HumanResources\ApvController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('saving_id', $saving->id) !!}
	
  @include('humanresources.apv.form')

{!! Form::close() !!}

@endsection