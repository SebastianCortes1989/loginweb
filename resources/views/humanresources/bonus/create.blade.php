@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Aguinaldo</h5>

{!! Form::open(['action' => 'HumanResources\BonuController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.bonus.form')
	
{!! Form::close() !!}

@endsection