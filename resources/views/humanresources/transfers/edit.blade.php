@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Editar Traslado</h3>

{!! Form::open(['action' => 'HumanResources\TransferController@update', 'method' => 'PUT']) !!}

  {!! Form::hidden('transfer_id', $transfer->id) !!}

	@include('humanresources.transfers.form')

{!! Form::close() !!}

@endsection