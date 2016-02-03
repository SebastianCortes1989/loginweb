@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Bono</h5>

{!! Form::open(['action' => 'HumanResources\BondController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('bond_id', $bond->id) !!}
	
  @include('humanresources.bonds.form')

{!! Form::close() !!}

@endsection