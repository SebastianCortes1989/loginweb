@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Aguinaldo</h3>

{!! Form::open(['action' => 'HumanResources\BonuController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.bonus.form')
	
{!! Form::close() !!}

@endsection