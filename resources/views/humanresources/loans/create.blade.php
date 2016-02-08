@extends('default')

@section('content')


@include('humanresources.menu')

<h5 class="purple-text center-align">Registrar Préstamo Personal</h5>

{!! Form::open(['action' => 'HumanResources\LoanController@store']) !!}

  {!! Form::hidden('client_id', Auth::user()->client_id) !!}

  @include('humanresources.loans.form')

{!! Form::close() !!}

@endsection