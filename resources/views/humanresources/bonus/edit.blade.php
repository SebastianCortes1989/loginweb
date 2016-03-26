@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Aguinaldo</h3>

{!! Form::open(['action' => 'HumanResources\BonuController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('bonus_id', $bonus->id) !!}

	@include('humanresources.bonus.form')

{!! Form::close() !!}

@endsection