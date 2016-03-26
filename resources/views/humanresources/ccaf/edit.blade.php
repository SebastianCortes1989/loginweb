@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Préstamo CCAF</h3>

{!! Form::open(['action' => 'HumanResources\CcafController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('ccaf_id', $ccaf->id) !!}

  @include('humanresources.ccaf.form')
	
{!! Form::close() !!}

@endsection