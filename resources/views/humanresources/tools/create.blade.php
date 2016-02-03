@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Desgaste de Herramienta</h5>

{!! Form::open(['action' => 'HumanResources\ToolController@store']) !!}

  	{!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.tools.form')

{!! Form::close() !!}

@endsection