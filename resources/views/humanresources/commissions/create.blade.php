@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Comisión</h5>

{!! Form::open(['action' => 'HumanResources\CommissionController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.commissions.form')

{!! Form::close() !!}

@endsection