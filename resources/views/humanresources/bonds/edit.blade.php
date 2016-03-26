@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Bono</h3>

{!! Form::open(['action' => 'HumanResources\BondController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('bond_id', $bond->id) !!}
	
  @include('humanresources.bonds.form')

{!! Form::close() !!}

@endsection