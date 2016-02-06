@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Viático</h5>

{!! Form::open(['action' => 'HumanResources\ViaticalController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.viaticals.form')

{!! Form::close() !!}

@endsection