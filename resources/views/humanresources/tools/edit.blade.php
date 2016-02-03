@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Desgaste de Herramienta</h5>

{!! Form::open(['action' => 'HumanResources\ToolController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('tool_id', $tool->id) !!}

	@include('humanresources.tools.form')

{!! Form::close() !!}

@endsection