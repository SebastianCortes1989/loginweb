@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Desgaste de Herramienta</h3>

{!! Form::open(['action' => 'HumanResources\ToolController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('tool_id', $tool->id) !!}

	@include('humanresources.tools.form')

{!! Form::close() !!}

@endsection