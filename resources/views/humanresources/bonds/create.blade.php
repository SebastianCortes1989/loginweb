@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Bono</h3>

{!! Form::open(['action' => 'HumanResources\BondController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.bonds.form')
	
{!! Form::close() !!}

@endsection