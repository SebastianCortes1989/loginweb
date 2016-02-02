@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Aguinaldo</h5>

{!! Form::open(['action' => 'HumanResources\BonuController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('bonus_id', $bonus->id) !!}

	@include('humanresources.bonus.form')

{!! Form::close() !!}

@endsection