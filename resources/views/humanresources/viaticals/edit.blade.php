@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Viático</h3>

{!! Form::open(['action' => 'HumanResources\ViaticalController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('viatical_id', $viatical->id) !!}

	@include('humanresources.viaticals.form')

{!! Form::close() !!}

@endsection