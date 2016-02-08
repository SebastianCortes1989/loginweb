@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Editar Traslado</h5>

{!! Form::open(['action' => 'HumanResources\TransferController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('transfer_id', $transfer->id) !!}

	@include('humanresources.transfers.form')

{!! Form::close() !!}

@endsection