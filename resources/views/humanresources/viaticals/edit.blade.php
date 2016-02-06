@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Viático</h5>

{!! Form::open(['action' => 'HumanResources\ViaticalController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('viatical_id', $viatical->id) !!}

	@include('humanresources.viaticals.form')

{!! Form::close() !!}

@endsection