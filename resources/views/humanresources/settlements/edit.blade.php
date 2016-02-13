@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Finiquito</h5>

{!! Form::open(['action' => 'HumanResources\SettlementController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('settlement_id', $settlement->id) !!}

  @include('humanresources.settlements.form')

{!! Form::close() !!}

@endsection