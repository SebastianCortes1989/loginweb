@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Préstamo CCAF</h5>

{!! Form::open(['action' => 'HumanResources\CcafController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('ccaf_id', $ccaf->id) !!}

  @include('humanresources.ccaf.form')
	
{!! Form::close() !!}

@endsection