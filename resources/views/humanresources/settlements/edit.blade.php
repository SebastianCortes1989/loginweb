@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Finiquito</h3>

{!! Form::open(['action' => 'HumanResources\SettlementController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('settlement_id', $settlement->id) !!}

  @include('humanresources.settlements.form')

{!! Form::close() !!}

@endsection