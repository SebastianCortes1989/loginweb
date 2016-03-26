@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Traslado</h3>

{!! Form::open(['action' => 'HumanResources\TransferController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.transfers.form')

{!! Form::close() !!}

@endsection