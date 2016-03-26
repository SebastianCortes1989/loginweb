@extends('default')

@section('content')


@include('humanresources.menu')

<h3 class="text-center">Registrar Comisión</h3>

{!! Form::open(['action' => 'HumanResources\CommissionController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.commissions.form')

{!! Form::close() !!}

@endsection