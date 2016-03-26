@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Viático</h3>

{!! Form::open(['action' => 'HumanResources\ViaticalController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.viaticals.form')

{!! Form::close() !!}

@endsection