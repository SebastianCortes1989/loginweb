@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Traslado</h5>

{!! Form::open(['action' => 'HumanResources\TransferController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

	@include('humanresources.transfers.form')

{!! Form::close() !!}

@endsection