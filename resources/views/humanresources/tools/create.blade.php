@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Desgaste de Herramienta</h3>

{!! Form::open(['action' => 'HumanResources\ToolController@store']) !!}

  	{!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.tools.form')

{!! Form::close() !!}

@endsection